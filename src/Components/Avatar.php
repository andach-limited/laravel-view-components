<?php

namespace Andach\LaravelViewComponents\Components;

class Avatar extends BaseComponent
{
    public function __construct(
        // Individual Arguments
        public ?string $alt = null,
        public ?string $img = null,
        public ?string $label = null,
        // Generic Arguments
        public ?bool $background = null,
        public ?bool $border = null,
        public ?bool $hollow = null,
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
        return view(config('view-components.views.avatar'));
    }
}
