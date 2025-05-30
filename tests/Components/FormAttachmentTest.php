<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Components\FormAttachment;
use Andach\LaravelViewComponents\Tests\AndachTestCase;
use Illuminate\Support\Facades\Blade;

class FormAttachmentTest extends AndachTestCase
{
    public function testRender()
    {
        $view = $this->blade('<x-andach-form-attachment>Form Attachment Content</x-andach-form-attachment>');

        $view->assertSee('Form Attachment Content', false);
    }
}
