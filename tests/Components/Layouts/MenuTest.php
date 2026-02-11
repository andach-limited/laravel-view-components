<?php

namespace Andach\LaravelViewComponents\Tests\Components\Layouts;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class MenuTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-menu />');

        $view->assertSee('class="', false);
    }
}
