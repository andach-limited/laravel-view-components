<?php

namespace Andach\LaravelViewComponents\Components;

class Faq extends BaseComponent
{
    public function __construct(
        // Unique Arguments
        public ?string $question = null,
        public ?string $answer = null,
        // Generic Arguments
        public ?string $background = null,
        public ?string $border = null,
        public ?string $divide = null,
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
        return view(config('view-components.views.faq'));
    }
}
