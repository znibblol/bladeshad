<?php

namespace BladeShadow;

use Illuminate\Support\ServiceProvider;

class BladeShadServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\BladeShadow\Console\Commands\InitCommand::class)) {
            $this->commands([\BladeShadow\Console\Commands\InitCommand::class]);
        }

        if (class_exists(\BladeShadow\Console\Commands\AddCommand::class)) {
            $this->commands([\BladeShadow\Console\Commands\AddCommand::class]);
        }
    }
}
