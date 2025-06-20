<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class Code extends BaseComponent
{
    public string $iconHtml = '';

    public function __construct(
        string $color = 'blue',
        public string $variant = 'solid'
    ) {
        parent::__construct($color);
    }

    public function render()
    {
        return view(config('view-components.views.code'));
    }
}
