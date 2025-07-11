<?php

namespace Andach\LaravelViewComponents\Components\Layouts;

use Andach\LaravelViewComponents\Components\BaseComponent;

class Breadcrumbs extends BaseComponent
{
    public function __construct(
        // Unique Arguments
        public ?array $breadcrumbs = null,
        public ?string $separator = null,
        // Generic Arguments
        public ?string $background = null,
        public ?string $border = null,
        public ?string $divide = null,
        public ?string $hollow = 'true',
        public ?string $pageBackground = 'true',
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
        return view(config('view-components.views.breadcrumbs'));
    }
}
