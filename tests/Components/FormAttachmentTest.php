<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class FormAttachmentTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-form-attachment>Form Attachment Content</x-andach-form-attachment>');

        $view->assertSee('Form Attachment Content', false);
    }
}
