<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Components\Button;
use Andach\LaravelViewComponents\Tests\AndachTestCase;
use Illuminate\Support\Facades\Blade;

class ButtonTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-button link="/link" color="blue" icon="Icon Here">Click Me</x-andach-button>');

        $view->assertSee('/link', false);
        $view->assertSee('blue', false);
        $view->assertSee('Icon Here', false);
        $view->assertSee('Click Me', false);
    }
}
