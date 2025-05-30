<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class TdTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-td>TD Content</x-andach-td>');

        $view->assertSee('TD Content', false);
    }
}
