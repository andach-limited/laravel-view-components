<?php

namespace Andach\LaravelViewComponents\Components\General;

use Andach\LaravelViewComponents\BaseComponent;
use Closure;

class MenuGroup extends BaseComponent
{
    public function __construct(
        // Unique Arguments
        public ?string $url = '',
        public ?string $title = '',
        public ?bool $selected = false,
        public ?array $items = [],
        public ?string $icon = '',
        // Generic Arguments
        public ?bool $accent = null,
        public ?bool $active = null,
        public ?bool $animate = null,
        public ?bool $background = null,
        public ?bool $border = null,
        public ?bool $divide = null,
        public ?bool $focus = null,
        public ?bool $full = null,
        public ?bool $gradient = null,
        public ?bool $hollow = true,
        public ?bool $hover = null,
        public ?bool $pageBackground = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
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
