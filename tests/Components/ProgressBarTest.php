<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ProgressBarTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-progress-bar>Progress Bar Content</x-andach-progress-bar>');

        $view->assertSee('Progress Bar Content', false);
    }
}
