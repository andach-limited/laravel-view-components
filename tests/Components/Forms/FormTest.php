<?php

namespace Andach\LaravelViewComponents\Tests\Components\Forms;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class FormTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-form action="/test" />');

        $view->assertSee('<form', false);
    }
}
