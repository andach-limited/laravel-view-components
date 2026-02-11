<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class CardTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-card />');

        $view->assertSee('class="', false);
    }
}
