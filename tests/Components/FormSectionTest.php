<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Components\FormSection;
use Andach\LaravelViewComponents\Tests\AndachTestCase;
use Illuminate\Support\Facades\Blade;

class FormSectionTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-form-section name="Name Here">Form Section Content</x-andach-form-section>');

        $view->assertSee('Name Here', false);
        $view->assertSee('Form Section Content', false);
    }
}
