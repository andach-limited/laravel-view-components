<?php

namespace Andach\LaravelViewComponents;

use Andach\LaravelViewComponents\Components\Alert;
use Andach\LaravelViewComponents\Components\AttachmentsAndComments;
use Andach\LaravelViewComponents\Components\Button;
use Andach\LaravelViewComponents\Components\Card;
use Andach\LaravelViewComponents\Components\Chat;
use Andach\LaravelViewComponents\Components\Code;
use Andach\LaravelViewComponents\Components\FormAttachment;
use Andach\LaravelViewComponents\Components\FormCheckboxIcon;
use Andach\LaravelViewComponents\Components\FormSection;
use Andach\LaravelViewComponents\Components\H;
use Andach\LaravelViewComponents\Components\MenuGroup;
use Andach\LaravelViewComponents\Components\NoResults;
use Andach\LaravelViewComponents\Components\OauthButton;
use Andach\LaravelViewComponents\Components\ProgressBar;
use Andach\LaravelViewComponents\Components\ProgressBarItem;
use Andach\LaravelViewComponents\Components\Table;
use Andach\LaravelViewComponents\Components\Tbody;
use Andach\LaravelViewComponents\Components\Td;
use Andach\LaravelViewComponents\Components\Th;
use Andach\LaravelViewComponents\Components\Thead;
use Illuminate\Pagination\Paginator;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelViewComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        Paginator::defaultView(config('view-components.pagination.standard'));
        Paginator::defaultSimpleView(config('view-components.pagination.simple'));

        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-view-components')
            ->hasAssets()
            ->hasConfigFile()
            ->hasViews()
            ->hasViewComponent('andach', Alert::class)
            ->hasViewComponent('andach', AttachmentsAndComments::class)
            ->hasViewComponent('andach', Button::class)
            ->hasViewComponent('andach', Card::class)
            ->hasViewComponent('andach', Chat::class)
            ->hasViewComponent('andach', Code::class)
            ->hasViewComponent('andach', FormAttachment::class)
            ->hasViewComponent('andach', FormCheckboxIcon::class)
            ->hasViewComponent('andach', FormSection::class)
            ->hasViewComponent('andach', H::class)
            ->hasViewComponent('andach', MenuGroup::class)
            ->hasViewComponent('andach', NoResults::class)
            ->hasViewComponent('andach', OauthButton::class)
            ->hasViewComponent('andach', ProgressBar::class)
            ->hasViewComponent('andach', ProgressBarItem::class)
            ->hasViewComponent('andach', Table::class)
            ->hasViewComponent('andach', Tbody::class)
            ->hasViewComponent('andach', Td::class)
            ->hasViewComponent('andach', Th::class)
            ->hasViewComponent('andach', Thead::class)
            ->hasInstallCommand(function (InstallCommand $command): void {
                $command
                    ->startWith(function (InstallCommand $command): void {
                        $command->info('Hello, and welcome to my great new package!');
                    })
                    ->askToStarRepoOnGitHub('andach-limited/laravel-view-components')
                    ->endWith(function (InstallCommand $command): void {
                        $command->info('Have a great day!');
                    });
            });
    }
}
