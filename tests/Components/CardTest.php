<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Components\Card;
use Andach\LaravelViewComponents\Tests\AndachTestCase;
use Illuminate\Support\Facades\Blade;

class CardTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-card :title="Title Here" :class="Class Here">Card Content</x-andach-card>');

        $view->assertSee('Title Here', false);
        $view->assertSee('Class Here', false);
        $view->assertSee('Card Content', false);
    }
}
