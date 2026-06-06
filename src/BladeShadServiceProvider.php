<?php

namespace BladeShad;

use Illuminate\Support\ServiceProvider;

class BladeShadServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\BladeShad\Console\Commands\InitCommand::class)) {
            $this->commands([\BladeShad\Console\Commands\InitCommand::class]);
        }

        if (class_exists(\BladeShad\Console\Commands\AddCommand::class)) {
            $this->commands([\BladeShad\Console\Commands\AddCommand::class]);
        }
    }
}
