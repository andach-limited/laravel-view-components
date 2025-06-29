<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class CardTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-card>Test card content</x-andach-card>');

        $view->assertSee('flex flex-col overflow-hidden bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 accent-slate-600 hover:accent-slate-700 border-2 rounded');
        $view->assertSee('Test card content');
    }

    public function testRenderWithHeaderBodyFooter(): void
    {
        $view = $this->blade('
            <x-andach-card>
                <x-slot:header>Card Header</x-slot>
                <x-slot:body>Card Body Content</x-slot>
                <x-slot:footer>Card Footer</x-slot>
            </x-andach-card>
        ');

        $view->assertSee('Card Header');
        $view->assertSee('Card Body Content');
        $view->assertSee('Card Footer');
    }
}
