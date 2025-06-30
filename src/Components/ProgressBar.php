<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProgressBar extends BaseComponent
{
    protected array $arrayBuildClasses = ['background', 'border', 'ring', 'rounded', 'shadow'];

    protected array $arrayElementClasses = ['liComplete', 'liIncomplete', 'li', 'liNotLast', 'icon', 'iconSpan', 'content'];

    public int $count = 1;

    /**
     * Create a new component instance.
     */
    public function __construct(
        // Unique Arguments
        public ?string $inactiveVariant = null,
        public array $items,
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

        $this->twMergeStrings['li-complete']   = $this->variantArray['highlightBorder'] . ' ' . $this->twMergeStrings['li-complete'] . ' ' . $this->variantArray['highlightDarkBorder'];
        $this->twMergeStrings['li-incomplete'] = $this->variantArray['inactiveBorder'] . ' ' . $this->twMergeStrings['li-incomplete'] . ' ' . $this->variantArray['inactiveDarkBorder'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(config('view-components.views.progress-bar'));
    }
}
