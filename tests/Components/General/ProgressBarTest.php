<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class ProgressBarTest extends AndachTestCase
{
    public function testRender(): void
    {
        $progressItems = [
            [
                'text'     => 'User Info',
                'complete' => true,
                'icon'     => '<i class="fa-solid fa-user fa-2xl"></i>',
            ],
            [
                'text'     => 'Company Info',
                'complete' => true,
                'icon'     => '<i class="fa-solid fa-building fa-2xl"></i>',
            ],
            [
                'text' => 'Payment',
                'icon' => '<i class="fa-solid fa-cash-register fa-2xl"></i>',
            ],
            [
                'text' => 'Confirmation',
                'icon' => '<i class="fa-solid fa-check fa-2xl"></i>',
            ],
        ];

        $view = $this->blade('<x-andach-progress-bar :items="$progressItems" />',
            ['progressItems' => $progressItems]);

        $view->assertSee('class="', false);
    }
}
