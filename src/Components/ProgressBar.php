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
        public array $items,
        public ?bool $background = null,
        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
        public ?string $inactiveVariant = null,
    ) {
        parent::__construct();

        $this->twMergeStrings['li-complete']   = 'border-' . $this->variantArray['highlight'] . ' ' . $this->twMergeStrings['li-complete'] . '  dark:border-' . $this->variantArray['highlightDark'];
        $this->twMergeStrings['li-incomplete'] = 'border-' . $this->variantArray['inactive'] . ' ' . $this->twMergeStrings['li-incomplete'] . '  dark:border-' . $this->variantArray['inactiveDark'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(config('view-components.views.progress-bar'));
    }
}
