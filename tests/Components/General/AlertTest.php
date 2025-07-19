<?php

namespace Andach\LaravelViewComponents\Tests\Components\General;

use Andach\LaravelViewComponents\Tests\AndachTestCase;

class AlertTest extends AndachTestCase
{
    public function testRender(): void
    {
        $view = $this->blade('<x-andach-alert>Test message</x-andach-alert>');

        $view->assertSee('flex flex-wrap items-center mb-4 text-base px-4 py-3 gap-5 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 accent-slate-600 hover:accent-slate-700 border-2 rounded');
        $view->assertSee('Test message');
    }

    public function testRenderWithAttributes(): void
    {
        $view = $this->blade('<x-andach-alert :ring="true" :shadow="true">Test message</x-andach-alert>');

        $view->assertSee('flex flex-wrap items-center mb-4 text-base px-4 py-3 gap-5 bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 accent-slate-600 hover:accent-slate-700 border-2 ring-2 ring-offset-2 rounded shadow-md');
        $view->assertSee('Test message');
    }

    public function testRenderWithBooleanAttributes(): void
    {
        $view = $this->blade('<x-andach-alert :border="false">No border</x-andach-alert>');
        $view->assertDontSee('border-2');
        $view->assertSee('No border');

        $view = $this->blade('<x-andach-alert :ring="true">With ring</x-andach-alert>');
        $view->assertSee('ring-2 ring-offset-2');
        $view->assertSee('With ring');

        $view = $this->blade('<x-andach-alert :shadow="true">With shadow</x-andach-alert>');
        $view->assertSee('shadow-md');
        $view->assertSee('With shadow');

        $view = $this->blade('<x-andach-alert :rounded="false">No rounding</x-andach-alert>');
        $view->assertDontSee('rounded');
        $view->assertSee('No rounding');
    }

    public function testRenderWithComplexCombinations(): void
    {
        $view = $this->blade('<x-andach-alert variant="success" size="lg" :dismissible="true" title="Success!" icon="<i class=\'fa-solid fa-check\'></i>">Operation completed</x-andach-alert>');
        $view->assertSee('bg-emerald-200 dark:bg-emerald-700');
        $view->assertSee('text-lg px-5 py-4 gap-6');
        $view->assertSee('<i class=\'fa-solid fa-check\'></i>', false);
        $view->assertSee('Success!');
        $view->assertSee('Operation completed');
        $view->assertSee('lvc-alert-dismiss');

        $view = $this->blade('<x-andach-alert variant="danger" :ring="true" :shadow="true" title="Error">Something went wrong</x-andach-alert>');
        $view->assertSee('bg-red-200 dark:bg-red-700');
        $view->assertSee('ring-2 ring-offset-2');
        $view->assertSee('shadow-md');
        $view->assertSee('Error');
        $view->assertSee('Something went wrong');

        $view = $this->blade('<x-andach-alert size="xs" :border="false" :rounded="false">Minimal alert</x-andach-alert>');
        $view->assertSee('text-xs px-2 py-1 gap-3');
        $view->assertDontSee('border-2');
        $view->assertDontSee('rounded');
        $view->assertSee('Minimal alert');
    }

    public function testRenderWithDismissible(): void
    {
        $view = $this->blade('<x-andach-alert :dismissible="true">Dismissible alert</x-andach-alert>');

        $view->assertSee('<button', false);
        $view->assertSee('lvc-alert-dismiss');
        $view->assertSee('<svg', false);
        $view->assertSee('viewBox="0 0 10 10"', false);
        $view->assertSee('laravel-view-components.js');
        $view->assertSee('Dismissible alert');
    }

    public function testRenderWithIcon(): void
    {
        $view = $this->blade('<x-andach-alert icon="<i class=\'fa-solid fa-info-circle\'></i>">Test message with icon</x-andach-alert>');

        $view->assertSee('<i class=\'fa-solid fa-info-circle\'></i>', false);
        $view->assertSee('Test message with icon');
    }

    public function testRenderWithSizes(): void
    {
        $view = $this->blade('<x-andach-alert size="xs">Extra small</x-andach-alert>');
        $view->assertSee('text-xs px-2 py-1 gap-3');
        $view->assertSee('Extra small');

        $view = $this->blade('<x-andach-alert size="sm">Small</x-andach-alert>');
        $view->assertSee('text-sm px-3 py-2 gap-4');
        $view->assertSee('Small');

        $view = $this->blade('<x-andach-alert size="base">Base</x-andach-alert>');
        $view->assertSee('text-base px-4 py-3 gap-5');
        $view->assertSee('Base');

        $view = $this->blade('<x-andach-alert size="lg">Large</x-andach-alert>');
        $view->assertSee('text-lg px-5 py-4 gap-6');
        $view->assertSee('Large');

        $view = $this->blade('<x-andach-alert size="xl">Extra large</x-andach-alert>');
        $view->assertSee('text-xl px-6 py-5 gap-7');
        $view->assertSee('Extra large');
    }

    public function testRenderWithTitle(): void
    {
        $view = $this->blade('<x-andach-alert title="Important Notice">Test message with title</x-andach-alert>');

        $view->assertSee('<h3', false);
        $view->assertSee('font-bold');
        $view->assertSee('Important Notice');
        $view->assertSee('Test message with title');
    }

    public function testRenderWithTitleSizes(): void
    {
        $view = $this->blade('<x-andach-alert size="xs" title="XS Title">XS content</x-andach-alert>');
        $view->assertSee('text-base'); // xs title size
        $view->assertSee('XS Title');

        $view = $this->blade('<x-andach-alert size="sm" title="SM Title">SM content</x-andach-alert>');
        $view->assertSee('text-lg'); // sm title size
        $view->assertSee('SM Title');

        $view = $this->blade('<x-andach-alert size="lg" title="LG Title">LG content</x-andach-alert>');
        $view->assertSee('text-2xl'); // lg title size
        $view->assertSee('LG Title');

        $view = $this->blade('<x-andach-alert size="xl" title="XL Title">XL content</x-andach-alert>');
        $view->assertSee('text-3xl'); // xl title size
        $view->assertSee('XL Title');
    }

    public function testRenderWithVariants(): void
    {
        $view = $this->blade('<x-andach-alert variant="default">Default variant</x-andach-alert>');
        $view->assertSee('bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200');
        $view->assertSee('Default variant');

        $view = $this->blade('<x-andach-alert variant="success">Success variant</x-andach-alert>');
        $view->assertSee('bg-emerald-200 dark:bg-emerald-700 text-emerald-800 dark:text-emerald-200');
        $view->assertSee('Success variant');

        $view = $this->blade('<x-andach-alert variant="warning">Warning variant</x-andach-alert>');
        $view->assertSee('bg-orange-200 dark:bg-orange-700 text-orange-800 dark:text-orange-200');
        $view->assertSee('Warning variant');

        $view = $this->blade('<x-andach-alert variant="danger">Danger variant</x-andach-alert>');
        $view->assertSee('bg-red-200 dark:bg-red-700 text-red-800 dark:text-red-200');
        $view->assertSee('Danger variant');

        $view = $this->blade('<x-andach-alert variant="primary">Primary variant</x-andach-alert>');
        $view->assertSee('bg-cyan-200 dark:bg-cyan-700 text-cyan-800 dark:text-cyan-200');
        $view->assertSee('Primary variant');
    }
}
