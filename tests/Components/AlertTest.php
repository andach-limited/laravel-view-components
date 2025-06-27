<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class AlertTest extends AndachTestCase
{
    public function testRenderWithIcon(): void
    {
        $view = $this->blade('<x-andach-alert>Test message</x-alert>');

        $view->assertSee('Test message', false);
    }
}
