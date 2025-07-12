<?php

namespace Andach\LaravelViewComponents\Components\General;

use Andach\LaravelViewComponents\BaseComponent;
use Closure;
use Illuminate\Contracts\View\View;

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
        public ?bool $accent = null,
        public ?bool $active = null,
        public ?bool $animate = null,
        public ?bool $background = null,
        public ?bool $border = null,
        public ?bool $divide = null,
        public ?bool $focus = null,
        public ?bool $full = null,
        public ?bool $gradient = null,
        public ?bool $hollow = null,
        public ?bool $hover = null,
        public ?bool $pageBackground = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
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
