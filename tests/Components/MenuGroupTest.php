<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class MenuGroupTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-menu-group menu-parent-route="/test"
            menu-group-name="Menu Group Name"
            currently-selected="1"
            :menu-array="[]"
            menu-svg="<i class=\'fa-solid fa-house\'></i>"/>');

        $view->assertSee('Menu Group Content', false);
    }
}
