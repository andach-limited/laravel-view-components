<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ProgressBarItemTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-progress-bar-item :href="/link">Progress Item Content</x-andach-progress-bar-item>');

        $view->assertSee('/link', false);
        $view->assertSee('Progress Item Content', false);
    }
}
