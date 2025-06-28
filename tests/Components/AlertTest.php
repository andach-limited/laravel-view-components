<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class AlertTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-alert>Test message</x-alert>');

        $view->assertSee('flex flex-wrap items-center mb-4 text-base px-4 py-3 gap-5 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 accent-slate-600 hover:accent-slate-700 border-2 rounded');
        $view->assertSee('Test message');
    }

    public function testRenderWithAttributes(): void
    {
        $view = $this->blade('<x-andach-alert :ring="true" :shadow="true">Test message</x-alert>');

        $view->assertSee('flex flex-wrap items-center mb-4 text-base px-4 py-3 gap-5 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 accent-slate-600 hover:accent-slate-700 border-2 ring-2 ring-offset-2 rounded shadow-md');
        $view->assertSee('Test message');
    }
}
