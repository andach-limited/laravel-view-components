<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ThTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-th>TH Content</x-andach-th>');

        $view->assertSee('TH Content', false);
    }
}
