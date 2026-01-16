<?php

namespace Andach\LaravelViewComponents\Tests\Components\Forms;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class InputTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-input name="name" x-thing="a" />');

        dd($view);
    }
}
