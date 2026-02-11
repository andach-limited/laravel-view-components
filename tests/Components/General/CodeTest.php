<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class CodeTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-code />');

        $view->assertSee('class="', false);
    }
}
