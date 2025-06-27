<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NoResults extends BaseComponent
{
    protected array $arrayBuildClasses = ['border', 'ring', 'rounded', 'shadow'];

    protected array $arrayElementClasses = ['internalDiv', 'title', 'icon'];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $icon = null,
        public ?string $title = null,
        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
        public ?string $classes = null,
        public ?string $internalDivClasses = null,
        public ?string $titleClasses = null,
        public ?string $iconClasses = null,
    ) {
        parent::__construct();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(config('view-components.views.no-results'));
    }
}
