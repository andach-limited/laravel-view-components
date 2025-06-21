<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class Alert extends BaseComponent
{
    public string $iconHtml = '';

    public function __construct(
        string $color = 'blue',
        public string $variant = 'solid',
        public array|string|null $icon = null
    ) {
        parent::__construct($color);

        $this->iconHtml = $this->generateIconHtml($icon);
    }

    public function render()
    {
        return view(config('view-components.views.alert'));
    }
}
