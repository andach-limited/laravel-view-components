<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class HTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-h />');

        $view->assertSee('<h', false);
    }
}
