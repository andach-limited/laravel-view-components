<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class FormCheckboxIconTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-form-checkbox-icon name="Name Here">Checkbox Content</x-andach-form-checkbox-icon>');

        $view->assertSee('Name Here', false);
        $view->assertSee('Checkbox Content', false);
    }
}
