<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class MenuGroupTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-menu-group />');

        $view->assertSee('class="', false);
    }
}
