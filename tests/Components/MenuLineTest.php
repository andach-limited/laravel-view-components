<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class MenuLineTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-menu-line menuLineName="Line Name Here" menuLineRoute="Line Route Here">Menu Line Content</x-andach-menu-line>');

        $view->assertSee('Line Name Here', false);
        $view->assertSee('Line Route Here', false);
        $view->assertSee('Menu Line Content', false);
    }
}
