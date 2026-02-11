<?php

namespace Andach\LaravelViewComponents\Tests\Components\Layouts;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class FooterTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-footer />');

        $view->assertSee('class="', false);
    }
}
