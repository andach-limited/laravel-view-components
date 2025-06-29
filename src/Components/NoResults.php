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
        // Attribute Arguments
        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        // Generic Arguments
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
