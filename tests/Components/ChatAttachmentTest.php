<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ChatAttachmentTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-chat-attachment>Chat Attachment Content</x-andach-chat-attachment>');

        $view->assertSee('Chat Attachment Content', false);
    }
}
