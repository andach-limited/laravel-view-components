<?php

namespace Andach\LaravelViewComponents\Tests\Components\Layouts;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ContentTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-content />');

        $view->assertSee('class="', false);
    }
}
