<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ChatTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-chat name="Name Here" time="12:34" picture="/img/avatar_f.png">
            Hi! I love your products.
        </x-andach-chat>');

        $view->assertSee('class="', false);
    }
}
