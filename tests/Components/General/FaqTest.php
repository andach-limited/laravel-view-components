<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class FaqTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-faq />');

        $view->assertSee('<details', false);
    }
}
