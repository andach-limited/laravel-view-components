<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ChatTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-chat>Chat Content</x-andach-chat>');

        $view->assertSee('Chat Content', false);
    }
}
