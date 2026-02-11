<?php

namespace Andach\LaravelViewComponents\Tests\Components\Forms;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class RadioTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-radio name="name" />');

        $view->assertSee('name="name"', false);
    }
}
