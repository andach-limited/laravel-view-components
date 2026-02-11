<?php

namespace Andach\LaravelViewComponents\Tests\Components\Forms;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class CheckboxTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-checkbox name="name" />');

        $view->assertSee('name="name"', false);
    }
}
