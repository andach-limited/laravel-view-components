<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class SignaturePadTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-signature-pad />');

        $view->assertSee('<button type="button" class="sign-pad-button-clear">Clear</button>', false);
    }
}
