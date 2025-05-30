<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class OauthButtonTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-oauth-button route="/link" fontAwesome="Icon Here">OAuth Button Content</x-andach-oauth-button>');

        $view->assertSee('/link', false);
        $view->assertSee('Icon Here', false);
        $view->assertSee('OAuth Button Content', false);
    }
}
