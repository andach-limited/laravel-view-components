<?php

namespace Andach\LaravelViewComponents\Components;

class H extends BaseComponent
{
    public function __construct(
        // Unique Arguments
        public int $number = 1,
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

        $sizeClass = $this->extractTextSize(config('view-components.components.h.base'));
        $sizeIndex = $this->getSizeIndex($sizeClass);
        $newSize   = $this->sizes[$sizeIndex + $number - 1];

        $this->twMergeStrings['base'] .= ' text-' . $newSize;
    }

    public function render()
    {
        return view(config('view-components.views.h'));
    }
}
