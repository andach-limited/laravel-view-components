<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class AlertTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-alert />');

        $view->assertSee('<div x-transition x-transition.duration.300ms x-data="{ open: true }"', false);
    }
}
