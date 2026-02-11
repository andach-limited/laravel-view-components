<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class NoResultsTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-no-results />');

        $view->assertSee('class="', false);
    }
}
