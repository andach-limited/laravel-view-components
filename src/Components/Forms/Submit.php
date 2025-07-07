<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\Components\BaseComponent;
use Andach\LaravelViewComponents\Traits\HandlesDefaultAndOldValue;
use Andach\LaravelViewComponents\Traits\HandlesValidationErrors;
use TailwindMerge\Laravel\Facades\TailwindMerge;

class Submit extends BaseComponent
{
    public function __construct(
        public ?string $type = 'submit',
        // Generic Arguments
        public ?string $accent = null,
        public ?string $animate = null,
        public ?string $background = null,
        public ?string $border = null,
        public ?string $divide = null,
        public ?string $full = 'true',
        public ?string $hollow = null,
        public ?string $hover = null,
        public ?string $ring = null,
        public ?string $rounded = null,
        public ?string $shadow = null,
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
