<?php

namespace Andach\LaravelViewComponents;

use Andach\LaravelViewComponents\Components\Alert;
use Andach\LaravelViewComponents\Components\AttachmentsAndComments;
use Andach\LaravelViewComponents\Components\Button;
use Andach\LaravelViewComponents\Components\Card;
use Andach\LaravelViewComponents\Components\Chat;
use Andach\LaravelViewComponents\Components\ChatAttachment;
use Andach\LaravelViewComponents\Components\FormAttachment;
use Andach\LaravelViewComponents\Components\FormCheckboxIcon;
use Andach\LaravelViewComponents\Components\FormSection;
use Andach\LaravelViewComponents\Components\Header;
use Andach\LaravelViewComponents\Components\HeaderHistoryItem;
use Andach\LaravelViewComponents\Components\HeaderNotificationItem;
use Andach\LaravelViewComponents\Components\HeaderNotifications;
use Andach\LaravelViewComponents\Components\HeaderSearch;
use Andach\LaravelViewComponents\Components\HeaderSearchItem;
use Andach\LaravelViewComponents\Components\MenuGroup;
use Andach\LaravelViewComponents\Components\MenuLine;
use Andach\LaravelViewComponents\Components\NoResults;
use Andach\LaravelViewComponents\Components\OauthButton;
use Andach\LaravelViewComponents\Components\ProgressBar;
use Andach\LaravelViewComponents\Components\ProgressBarItem;
use Andach\LaravelViewComponents\Components\SignaturePad;
use Andach\LaravelViewComponents\Components\Table;
use Andach\LaravelViewComponents\Components\Tbody;
use Andach\LaravelViewComponents\Components\Td;
use Andach\LaravelViewComponents\Components\Th;
use Andach\LaravelViewComponents\Components\Thead;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasViewComponent('andach', Alert::class)
            ->hasViewComponent('andach', AttachmentsAndComments::class)
            ->hasViewComponent('andach', Button::class)
            ->hasViewComponent('andach', Card::class)
            ->hasViewComponent('andach', Chat::class)
            ->hasViewComponent('andach', ChatAttachment::class)
            ->hasViewComponent('andach', FormAttachment::class)
            ->hasViewComponent('andach', FormCheckboxIcon::class)
            ->hasViewComponent('andach', FormSection::class)
            ->hasViewComponent('andach', Header::class)
            ->hasViewComponent('andach', HeaderHistoryItem::class)
            ->hasViewComponent('andach', HeaderNotificationItem::class)
            ->hasViewComponent('andach', HeaderNotifications::class)
            ->hasViewComponent('andach', HeaderSearch::class)
            ->hasViewComponent('andach', HeaderSearchItem::class)
            ->hasViewComponent('andach', MenuGroup::class)
            ->hasViewComponent('andach', MenuLine::class)
            ->hasViewComponent('andach', NoResults::class)
            ->hasViewComponent('andach', OauthButton::class)
            ->hasViewComponent('andach', ProgressBar::class)
            ->hasViewComponent('andach', ProgressBarItem::class)
            ->hasViewComponent('andach', SignaturePad::class)
            ->hasViewComponent('andach', Table::class)
            ->hasViewComponent('andach', Tbody::class)
            ->hasViewComponent('andach', Td::class)
            ->hasViewComponent('andach', Th::class)
            ->hasViewComponent('andach', Thead::class)
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Hello, and welcome to my great new package!');
                    })
                    ->publishConfigFile()
                    ->askToStarRepoOnGitHub('andach-limited/laravel-view-components')
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Have a great day!');
                    });
            });
    }
}
