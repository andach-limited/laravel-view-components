<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class NoResultsTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-no-results icon="Icon Here" title="Title Here">No Results Content</x-andach-no-results>');

        $view->assertSee('Icon Here', false);
        $view->assertSee('Title Here', false);
        $view->assertSee('No Results Content', false);
    }
}
