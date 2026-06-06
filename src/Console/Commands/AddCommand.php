<?php

namespace BladeShad\Console\Commands;

use Illuminate\Console\Command;

class AddCommand extends Command
{
    protected $signature = 'bladeshad:add {components?* : Component name(s) to add} {--force : Overwrite existing files} {--list : List available components}';

    protected $description = 'Add BladeShadow components to your project';

    public function handle(): int
    {
        $registry = $this->loadRegistry();

        if ($registry === null) {
            return self::FAILURE;
        }

        if ($this->option('list')) {
            return $this->listComponents($registry);
        }

        $requested = $this->argument('components');

        if (empty($requested)) {
            $this->error('Please specify at least one component name, or use --list to see available components.');
            return self::FAILURE;
        }

        $unknown = array_diff($requested, array_keys($registry['components']));
        if (!empty($unknown)) {
            foreach ($unknown as $name) {
                $this->error("Unknown component: \"{$name}\". Run bladeshad:add --list to see available components.");
            }
            return self::FAILURE;
        }

        $resolved = $this->resolveAll($requested, $registry['components']);
        $this->copyFiles($resolved, $registry['components']);

        return self::SUCCESS;
    }

    private function loadRegistry(): ?array
    {
        $path = __DIR__ . '/../../../registry.json';

        if (!file_exists($path)) {
            $this->error('registry.json not found in package root.');
            return null;
        }

        $json = json_decode(file_get_contents($path), true);

        if (json_last_error() !== JSON_ERROR_NONE || !isset($json['components'])) {
            $this->error('registry.json is malformed.');
            return null;
        }

        return $json;
    }

    private function listComponents(array $registry): int
    {
        $this->line('Available components:');
        $this->newLine();

        foreach (array_keys($registry['components']) as $name) {
            $deps = $registry['components'][$name]['dependencies'];
            $suffix = !empty($deps) ? ' <comment>(requires: ' . implode(', ', $deps) . ')</comment>' : '';
            $this->line("  <info>{$name}</info>{$suffix}");
        }

        $this->newLine();
        return self::SUCCESS;
    }

    /** @param string[] $names */
    private function resolveAll(array $names, array $components): array
    {
        $resolved = [];

        foreach ($names as $name) {
            $this->resolveDependencies($name, $components, $resolved);
        }

        return $resolved;
    }

    private function resolveDependencies(string $name, array $components, array &$resolved): void
    {
        if (in_array($name, $resolved, true)) {
            return;
        }

        foreach ($components[$name]['dependencies'] as $dep) {
            $this->resolveDependencies($dep, $components, $resolved);
        }

        $resolved[] = $name;
    }

    private function copyFiles(array $resolved, array $components): void
    {
        $stubsDir = __DIR__ . '/../../../stubs/components/';
        $destDir = resource_path('views/components/ui/');
        $force = $this->option('force');

        if (!is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }

        $copied = [];

        foreach ($resolved as $component) {
            foreach ($components[$component]['files'] as $file) {
                $src = $stubsDir . $file;
                $dest = $destDir . $file;

                if (!file_exists($src)) {
                    $this->warn("Stub not found for {$file} — skipping.");
                    continue;
                }

                if (file_exists($dest) && !$force) {
                    $this->warn("{$file} already exists — skipping. Use --force to overwrite.");
                    continue;
                }

                copy($src, $dest);
                $copied[] = 'resources/views/components/ui/' . $file;
            }
        }

        if (!empty($copied)) {
            $this->info('Copied:');
            foreach ($copied as $path) {
                $this->line("  {$path}");
            }
        } else {
            $this->line('No files were copied.');
        }
    }
}
