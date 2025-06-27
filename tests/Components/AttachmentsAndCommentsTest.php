<?php

namespace Andach\LaravelViewComponents\Tests\Components;

use Andach\LaravelViewComponents\Tests\AndachTestCase;
use Mockery;

class AttachmentsAndCommentsTest extends AndachTestCase
{
    public function testRender(): void
    {
        $model = Mockery::mock();
        $model->shouldReceive('attachmentsAndComments')
            ->andReturn([
                ['display_html' => '<p>Comment 1</p>'],
                ['display_html' => '<p>Attachment 1</p>'],
                ['display_html' => '<p>Comment 2</p>'],
            ]);

        $view = $this->blade('<x-andach-attachments-and-comments :model="$model" />');

        $view->assertSee('Test Content', false);
    }
}
