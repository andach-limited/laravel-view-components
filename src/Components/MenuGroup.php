<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class MenuGroup extends BaseComponent
{
    public function __construct(
        // Unique Arguments
        public ?string $url = '',
        public ?string $title = '',
        public ?bool $selected = false,
        public ?array $items = [],
        public ?string $icon = '',
        // Attribute Arguments
        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        // Generic Arguments
        public ?string $size = null,
        public ?string $variant = null,
    ) {
        parent::__construct();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view(config('view-components.views.menu-group'));
    }
}
