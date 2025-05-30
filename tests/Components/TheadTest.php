<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class TheadTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-thead>Thead Content</x-andach-thead>');

        $view->assertSee('Thead Content', false);
    }
}
