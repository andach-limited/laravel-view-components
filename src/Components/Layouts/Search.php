<?php

namespace Andach\LaravelViewComponents\Components\Layouts;

use Andach\LaravelViewComponents\Components\BaseComponent;

class Search extends BaseComponent
{
    public function __construct(
        // Generic Arguments
        public ?string $background = null,
        public ?string $border = null,
        public ?string $divide = null,
        public ?string $hollow = 'true',
        public ?string $pageBackground = null,
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
        return view(config('view-components.views.search'));
    }
}
