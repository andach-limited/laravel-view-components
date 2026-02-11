<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class TableTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-table />');

        $view->assertSee('<table', false);
    }
}
