<?php

namespace Andach\LaravelViewComponents\Tests\Components\Forms;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class SelectTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-select name="name" />');

        $view->assertSee('name="name"', false);
    }
}
