<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ButtonTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-button />');

        $view->assertSee('<button', false);
    }
}
