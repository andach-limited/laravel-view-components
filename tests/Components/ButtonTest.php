<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ButtonTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-button link="/link" color="blue" icon="Icon Here">Click Me</x-andach-button>');

        $view->assertSee('/link', false);
        $view->assertSee('blue', false);
        $view->assertSee('Icon Here', false);
        $view->assertSee('Click Me', false);
    }
}
