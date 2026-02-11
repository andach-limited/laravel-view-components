<?php

namespace Andach\LaravelViewComponents\Tests\Components\Forms;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class TextareaTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-textarea name="name" />');

        $view->assertSee('name="name"', false);
    }
}
