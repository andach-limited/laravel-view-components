<?php

namespace Andach\LaravelViewComponents;

use Andach\LaravelViewComponents\Components\Alert;
use Andach\LaravelViewComponents\Components\Avatar;
use Andach\LaravelViewComponents\Components\Button;
use Andach\LaravelViewComponents\Components\Card;
use Andach\LaravelViewComponents\Components\Chat;
use Andach\LaravelViewComponents\Components\Code;
use Andach\LaravelViewComponents\Components\Faq;
use Andach\LaravelViewComponents\Components\Forms\Checkbox;
use Andach\LaravelViewComponents\Components\Forms\Form;
use Andach\LaravelViewComponents\Components\Forms\FormError;
use Andach\LaravelViewComponents\Components\Forms\Input;
use Andach\LaravelViewComponents\Components\Forms\Label;
use Andach\LaravelViewComponents\Components\Forms\Select;
use Andach\LaravelViewComponents\Components\Forms\Submit;
use Andach\LaravelViewComponents\Components\Forms\Textarea;
use Andach\LaravelViewComponents\Components\H;
use Andach\LaravelViewComponents\Components\MenuGroup;
use Andach\LaravelViewComponents\Components\NoResults;
use Andach\LaravelViewComponents\Components\ProgressBar;
use Andach\LaravelViewComponents\Components\ServiceButton;
use Andach\LaravelViewComponents\Components\Table;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelViewComponentsServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        parent::boot();

        Blade::directive('bind', function ($bind) {
            return '<?php app(\Andach\LaravelViewComponents\FormDataBinder::class)->bind(' . $bind . '); ?>';
        });

        Blade::directive('endbind', function () {
            return '<?php app(\Andach\LaravelViewComponents\FormDataBinder::class)->pop(); ?>';
        });
    }

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
            ->hasViewComponent('andach', Avatar::class)
            ->hasViewComponent('andach', Button::class)
            ->hasViewComponent('andach', Card::class)
            ->hasViewComponent('andach', Chat::class)
            ->hasViewComponent('andach', Checkbox::class)
            ->hasViewComponent('andach', Code::class)
            ->hasViewComponent('andach', Faq::class)
            ->hasViewComponent('andach', Form::class)
            ->hasViewComponent('andach', FormError::class)
            ->hasViewComponent('andach', H::class)
            ->hasViewComponent('andach', Input::class)
            ->hasViewComponent('andach', Label::class)
            ->hasViewComponent('andach', MenuGroup::class)
            ->hasViewComponent('andach', NoResults::class)
            ->hasViewComponent('andach', ProgressBar::class)
            ->hasViewComponent('andach', Select::class)
            ->hasViewComponent('andach', ServiceButton::class)
            ->hasViewComponent('andach', Submit::class)
            ->hasViewComponent('andach', Table::class)
            ->hasViewComponent('andach', Textarea::class)
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

    public function register(): void
    {
        parent::register();

        $this->app->singleton(FormDataBinder::class, fn () => new FormDataBinder);
    }
}
