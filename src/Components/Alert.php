<?php

namespace Andach\LaravelViewComponents\Components;

class Alert extends BaseComponent
{

    public function __construct(
        public ?string $icon = null,
        public ?string $title = null,
        public ?bool $dismissible = null,
        public ?bool $divide = null,
        public ?bool $border = null,
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
        return view(config('view-components.views.alert'));
    }
}
