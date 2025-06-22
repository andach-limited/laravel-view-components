<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class Code extends BaseComponent
{
    protected array $arrayBuildClasses = ['border', 'hollow', 'ring', 'rounded', 'shadow', 'size'];
    protected array $arrayElementClasses = [];

    public function __construct(
        public ?string $blade = null,
        public ?string $border = null,
        public ?string $classes = null,
        public ?string $hollow = null,
        public ?string $language = null,
        public ?string $ring = null,
        public ?string $rounded = null,
        public ?string $shadow = null,
        public ?string $size = null,
        public ?string $theme = null,
        public ?string $variant = null,
    ) {
        parent::__construct();
    }

    public function render()
    {
        return view(config('view-components.views.code'));
    }
}
