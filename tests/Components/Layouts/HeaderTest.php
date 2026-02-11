<?php

namespace Andach\LaravelViewComponents\Tests\Components\Layouts;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class HeaderTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-header />');

        $view->assertSee('class="', false);
    }
}
