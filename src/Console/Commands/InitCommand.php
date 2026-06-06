<?php

namespace BladeShadow\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class InitCommand extends Command
{
    protected $signature = 'bladeshad:init';

    protected $description = 'Set up BladeShadow in your Laravel project';

    public function handle(): int
    {
        $this->installBladeLucide();
        $tailwindVersion = $this->detectTailwindVersion();
        $this->publishCss($tailwindVersion);
        $this->informCssImport();
        $this->publishCnHelper();
        $this->registerAutoload();
        $this->dumpAutoload();

        $this->info('Done! BladeShadow is ready to use.');
        $this->line('Run <comment>php artisan bladeshad:add button</comment> to add your first component.');

        return self::SUCCESS;
    }

    private function installBladeLucide(): void
    {
        $this->info('Installing blade-ui-toolkit/blade-lucide...');

        $process = new Process(['composer', 'require', 'blade-ui-toolkit/blade-lucide'], base_path());
        $process->setTimeout(300);
        $process->run(function (string $type, string $output): void {
            $this->output->write($output);
        });

        if (!$process->isSuccessful()) {
            $this->warn('Failed to install blade-lucide. You may need to run: composer require blade-ui-toolkit/blade-lucide');
        }
    }

    private function detectTailwindVersion(): int
    {
        if (file_exists(base_path('tailwind.config.js')) || file_exists(base_path('tailwind.config.ts'))) {
            $this->line('Detected Tailwind <comment>v3</comment> (found tailwind.config.js).');
            return 3;
        }

        $cssDir = resource_path('css');
        if (is_dir($cssDir)) {
            foreach (glob($cssDir . '/*.css') ?: [] as $file) {
                $contents = file_get_contents($file);
                if ($contents !== false && preg_match('/@import [\'"]tailwindcss[\'"]/', $contents)) {
                    $this->line('Detected Tailwind <comment>v4</comment> (found @import "tailwindcss" in ' . basename($file) . ').');
                    return 4;
                }
            }
        }

        $version = $this->choice('Could not detect Tailwind version. Which version are you using?', ['3', '4'], '3');
        return (int) $version;
    }

    private function publishCss(int $tailwindVersion): void
    {
        $stub = $tailwindVersion === 4
            ? __DIR__ . '/../../../stubs/css/bladeshad-v4.css'
            : __DIR__ . '/../../../stubs/css/bladeshad-v3.css';

        $destination = resource_path('css/bladeshad.css');

        if (file_exists($destination)) {
            $this->warn('resources/css/bladeshad.css already exists — skipping. Use --force to overwrite.');
            return;
        }

        $cssDir = resource_path('css');
        if (!is_dir($cssDir)) {
            mkdir($cssDir, 0755, true);
        }

        copy($stub, $destination);
        $this->info('Published resources/css/bladeshad.css (Tailwind v' . $tailwindVersion . ').');
    }

    private function informCssImport(): void
    {
        $this->newLine();
        $this->line('  Add the following import to <comment>resources/css/app.css</comment>:');
        $this->line("  <info>@import './bladeshad.css';</info>");
        $this->newLine();
    }

    private function publishCnHelper(): void
    {
        $destination = app_path('Helpers/BladeShadHelper.php');

        if (file_exists($destination)) {
            $this->warn('app/Helpers/BladeShadHelper.php already exists — skipping.');
            return;
        }

        $helpersDir = app_path('Helpers');
        if (!is_dir($helpersDir)) {
            mkdir($helpersDir, 0755, true);
        }

        $source = __DIR__ . '/../../Helpers/BladeShadHelper.php';
        copy($source, $destination);
        $this->info('Published app/Helpers/BladeShadHelper.php.');
    }

    private function registerAutoload(): void
    {
        $composerJsonPath = base_path('composer.json');

        if (!file_exists($composerJsonPath)) {
            $this->warn('composer.json not found — skipping autoload registration.');
            return;
        }

        $json = json_decode(file_get_contents($composerJsonPath), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->warn('Could not parse composer.json — skipping autoload registration.');
            return;
        }

        $entry = 'app/Helpers/BladeShadHelper.php';
        $files = $json['autoload']['files'] ?? [];

        if (in_array($entry, $files, true)) {
            $this->line('Autoload entry already present in composer.json — skipping.');
            return;
        }

        $files[] = $entry;
        $json['autoload']['files'] = $files;

        file_put_contents(
            $composerJsonPath,
            json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
        );

        $this->info('Registered app/Helpers/BladeShadHelper.php in composer.json autoload.files.');
    }

    private function dumpAutoload(): void
    {
        $this->info('Running composer dump-autoload...');

        $process = new Process(['composer', 'dump-autoload'], base_path());
        $process->setTimeout(60);
        $process->run(function (string $type, string $output): void {
            $this->output->write($output);
        });

        if (!$process->isSuccessful()) {
            $this->warn('composer dump-autoload failed. Run it manually to activate the cn() helper.');
        }
    }
}
