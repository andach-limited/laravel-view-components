<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class TableTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-table>Table Content</x-andach-table>');

        $view->assertSee('Table Content', false);
    }
}
