<?php

namespace Andach\LaravelViewComponents;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Andach\LaravelViewComponents\Commands\LaravelViewComponentsCommand;

class LaravelViewComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-view-components')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-view-components_table')
            ->hasCommand(LaravelViewComponentsCommand::class);
    }
}
