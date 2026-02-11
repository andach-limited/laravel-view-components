<?php

namespace Andach\LaravelViewComponents\Tests\Components\Layouts;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class DarkToggleTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-dark-toggle />');

        $view->assertSee('class="', false);
    }
}
