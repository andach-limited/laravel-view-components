<?php


namespace Andach\LaravelViewComponents\Tests\Components\Forms;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class SubmitTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-submit name="name" x-thing="a" />');

        dd($view);
    }
}
