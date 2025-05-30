<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class HeaderNotificationsTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-header-notifications />');

        $view->assertSee('Notifications', false);
    }
}
