<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\Components\BaseComponent;

class Label extends BaseComponent
{
    public bool $spoofMethod = false;

    public string $value = '';

    public function __construct(
        // Unique Arguments
        public bool $floating = false,
        public string $label = '',
        // Generic Arguments
        public ?string $background = null,
        public ?string $border = null,
        public ?string $divide = null,
        public ?string $hollow = 'true',
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
        return view(config('view-components.views.label'));
    }
}
