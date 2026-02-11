<?php

namespace Andach\LaravelViewComponents\Components\Layouts;

use Andach\LaravelViewComponents\BaseComponent;

class Menu extends BaseComponent
{
    public function __construct(
        // Unique Arguments
        public ?string $logo = null,
        public ?string $title = null,
        public ?bool $dismissible = null,
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

    public function render()
    {
        return view(config('view-components.views.menu'));
    }
}
