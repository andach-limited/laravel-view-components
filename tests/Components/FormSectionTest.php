<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class FormSectionTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-form-section name="Name Here">Form Section Content</x-andach-form-section>');

        $view->assertSee('Name Here', false);
        $view->assertSee('Form Section Content', false);
    }
}
