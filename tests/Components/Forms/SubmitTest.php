<?php

namespace Andach\LaravelViewComponents\Tests\Components\Forms;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class SubmitTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-submit name="name" x-thing="a" />');

        $view->assertSee('<div class="mb-4 flex items-center', false);
        $view->assertSee('type="submit"', false);
        $view->assertSee('class="text-center overflow-hidden text-base bg-emerald-200 dark:bg-emerald-700 font-bold py-2 px-4 focus:outline-none focus:shadow-outline mb-4 flex items-center justify-between text-emerald-800 dark:text-emerald-200 w-full rounded" name="name" x-thing="a"', false);
    }
}
