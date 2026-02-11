<?php

namespace Andach\LaravelViewComponents\Tests\Components\Layouts;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class SearchTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-search />');

        $view->assertSee('class="', false);
    }
}
