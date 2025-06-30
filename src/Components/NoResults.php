<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;

class NoResults extends BaseComponent
{
    public function __construct(
        // Unique Arguments
        public ?string $icon = null,
        public ?string $title = null,
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

    public function render(): View|Closure|string
    {
        return view(config('view-components.views.no-results'));
    }
}
