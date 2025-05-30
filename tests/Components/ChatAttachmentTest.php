<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Components\ChatAttachment;
use Andach\LaravelViewComponents\Tests\AndachTestCase;
use Illuminate\Support\Facades\Blade;

class ChatAttachmentTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-chat-attachment>Chat Attachment Content</x-andach-chat-attachment>');

        $view->assertSee('Chat Attachment Content', false);
    }
}
