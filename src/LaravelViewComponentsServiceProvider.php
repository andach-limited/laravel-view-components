<?php

namespace Andach\LaravelViewComponents;

use Andach\LaravelViewComponents\Components\Forms\Checkbox;
use Andach\LaravelViewComponents\Components\Forms\Form;
use Andach\LaravelViewComponents\Components\Forms\FormError;
use Andach\LaravelViewComponents\Components\Forms\Input;
use Andach\LaravelViewComponents\Components\Forms\Radio;
use Andach\LaravelViewComponents\Components\Forms\Select;
use Andach\LaravelViewComponents\Components\Forms\Submit;
use Andach\LaravelViewComponents\Components\Forms\Textarea;
use Andach\LaravelViewComponents\Components\General\Alert;
use Andach\LaravelViewComponents\Components\General\Avatar;
use Andach\LaravelViewComponents\Components\General\Button;
use Andach\LaravelViewComponents\Components\General\Card;
use Andach\LaravelViewComponents\Components\General\Chat;
use Andach\LaravelViewComponents\Components\General\Code;
use Andach\LaravelViewComponents\Components\General\Faq;
use Andach\LaravelViewComponents\Components\General\H;
use Andach\LaravelViewComponents\Components\General\MenuGroup;
use Andach\LaravelViewComponents\Components\General\NoResults;
use Andach\LaravelViewComponents\Components\General\ProgressBar;
use Andach\LaravelViewComponents\Components\General\ServiceButton;
use Andach\LaravelViewComponents\Components\General\Table;
use Andach\LaravelViewComponents\Components\Layouts\Breadcrumbs;
use Andach\LaravelViewComponents\Components\Layouts\Content;
use Andach\LaravelViewComponents\Components\Layouts\DarkToggle;
use Andach\LaravelViewComponents\Components\Layouts\Error;
use Andach\LaravelViewComponents\Components\Layouts\Footer;
use Andach\LaravelViewComponents\Components\Layouts\Header;
use Andach\LaravelViewComponents\Components\Layouts\HeaderLeft;
use Andach\LaravelViewComponents\Components\Layouts\HeaderMobile;
use Andach\LaravelViewComponents\Components\Layouts\HeaderRight;
use Andach\LaravelViewComponents\Components\Layouts\Layout;
use Andach\LaravelViewComponents\Components\Layouts\Main;
use Andach\LaravelViewComponents\Components\Layouts\Menu;
use Andach\LaravelViewComponents\Components\Layouts\Search;
use Andach\LaravelViewComponents\Components\Layouts\Sessions;
use Andach\LaravelViewComponents\Components\Layouts\Sidebar;
use Andach\LaravelViewComponents\Components\Layouts\SidebarFooter;
use Andach\LaravelViewComponents\Components\Layouts\SidebarMenu;
use Andach\LaravelViewComponents\Components\Layouts\SidebarTop;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
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

        view()->composer('*', function ($view) {
            $view->with('menu', $this->buildMenu());
        });
    }

    private function buildMenu(): array
    {
        $menu = config('view-components.menu', []);
        $routeName = request()->route()?->getName() ?? '';

        foreach ($menu as $key => &$section) {
            if (isset($section['selected-if-route-begins'])) {
                $prefix = $section['selected-if-route-begins'];
                $section['selected'] = str_starts_with($routeName, $prefix);
            }

            if (isset($section['route']) && Route::has($section['route'])) {
                $section['url'] = route($section['route']);
            }

            if (!isset($section['url'])) {
                $section['url'] = '#';
            }
        }

        return $menu;
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
            ->hasViewComponent('andach', Breadcrumbs::class)
            ->hasViewComponent('andach', Button::class)
            ->hasViewComponent('andach', Card::class)
            ->hasViewComponent('andach', Chat::class)
            ->hasViewComponent('andach', Checkbox::class)
            ->hasViewComponent('andach', Code::class)
            ->hasViewComponent('andach', Content::class)
            ->hasViewComponent('andach', DarkToggle::class)
            ->hasViewComponent('andach', Error::class)
            ->hasViewComponent('andach', Faq::class)
            ->hasViewComponent('andach', Footer::class)
            ->hasViewComponent('andach', Form::class)
            ->hasViewComponent('andach', FormError::class)
            ->hasViewComponent('andach', H::class)
            ->hasViewComponent('andach', Header::class)
            ->hasViewComponent('andach', HeaderLeft::class)
            ->hasViewComponent('andach', HeaderMobile::class)
            ->hasViewComponent('andach', HeaderRight::class)
            ->hasViewComponent('andach', Input::class)
            ->hasViewComponent('andach', Layout::class)
            ->hasViewComponent('andach', Main::class)
            ->hasViewComponent('andach', Menu::class)
            ->hasViewComponent('andach', MenuGroup::class)
            ->hasViewComponent('andach', NoResults::class)
            ->hasViewComponent('andach', ProgressBar::class)
            ->hasViewComponent('andach', Radio::class)
            ->hasViewComponent('andach', Search::class)
            ->hasViewComponent('andach', Select::class)
            ->hasViewComponent('andach', ServiceButton::class)
            ->hasViewComponent('andach', Sessions::class)
            ->hasViewComponent('andach', Sidebar::class)
            ->hasViewComponent('andach', SidebarFooter::class)
            ->hasViewComponent('andach', SidebarMenu::class)
            ->hasViewComponent('andach', SidebarTop::class)
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
