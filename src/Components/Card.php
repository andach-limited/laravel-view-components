<?php

namespace Andach\LaravelViewComponents\Components;

class Card extends BaseComponent
{
    public function __construct(
        // Generic Arguments
        public ?string $background = null,
        public ?string $border = null,
        public ?string $hollow = null,
        public ?string $ring = null,
        public ?string $rounded = null,
        public ?string $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
    ) {
        parent::__construct();
    }

    public function render()
    {
        return view(config('view-components.views.card'));
    }
}
