<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Components\Chat;
use Andach\LaravelViewComponents\Tests\AndachTestCase;
use Illuminate\Support\Facades\Blade;

class ChatTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-chat>Chat Content</x-andach-chat>');

        $view->assertSee('Chat Content', false);
    }
}
