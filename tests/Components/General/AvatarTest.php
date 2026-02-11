<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class AvatarTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-avatar />');

        $view->assertSee('class="', false);
    }
}
