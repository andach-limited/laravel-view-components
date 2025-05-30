<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class HeaderHistoryItemTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-header-history-item>History Item</x-andach-header-history-item>');

        $view->assertSee('History Item', false);
    }
}
