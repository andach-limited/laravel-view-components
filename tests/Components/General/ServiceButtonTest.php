<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ServiceButtonTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-service-button />');

        $view->assertSee('class="', false);
    }
}
