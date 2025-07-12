<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\BaseComponent;

class Submit extends BaseComponent
{
    public function __construct(
        public ?string $type = 'submit',
        // Generic Arguments
        public ?bool $accent = null,
        public ?bool $active = null,
        public ?bool $animate = null,
        public ?bool $background = null,
        public ?bool $border = null,
        public ?bool $divide = null,
        public ?bool $focus = null,
        public ?bool $full = true,
        public ?bool $gradient = null,
        public ?bool $hollow = null,
        public ?bool $hover = null,
        public ?bool $pageBackground = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        public ?string $size = null,
        public ?string $variant = 'success',
    ) {
        parent::__construct();

        $this->setAttributeBooleans();
    }

    public function render()
    {
        return view(config('view-components.views.submit'));
    }
}
