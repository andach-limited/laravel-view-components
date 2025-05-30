<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class HeaderSearchTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-header-search>Search Content</x-andach-header-search>');

        $view->assertSee('Recent searches', false);
    }
}
