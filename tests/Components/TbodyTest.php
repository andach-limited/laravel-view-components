<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class TbodyTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-tbody>Tbody Content</x-andach-tbody>');

        $view->assertSee('Tbody Content', false);
    }
}
