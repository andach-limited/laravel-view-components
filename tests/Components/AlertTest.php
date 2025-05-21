<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\LaravelViewComponentsServiceProvider;
use Andach\LaravelViewComponents\Tests\AndachTestCase;
use Illuminate\Support\Facades\Blade;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Andach\LaravelViewComponents\Components\Alert;

class AlertTest extends AndachTestCase
{
    /** @test */
    public function renderWithIcon()
    {
        $view = $this->blade('<x-andach-alert color="red" icon="fa fa-warning">Test message</x-alert>');

        $view->assertSee('role="alert"', false);
        $view->assertSee('bg-red-100', false);
        $view->assertSee('text-red-600', false);
        $view->assertSee('fa fa-warning', false);
        $view->assertSee('Test message', false);
    }

    /** @test */
    public function renderWithoutIcon()
    {
        $view = $this->blade('<x-andach-alert color="green">No icon message</x-andach-alert>');

        $view->assertSee('bg-green-100', false);
        $view->assertSee('text-green-600', false);
        $view->assertDontSee('<i', false);
        $view->assertSee('No icon message', false);
    }
}
