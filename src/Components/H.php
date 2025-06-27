<?php

namespace Andach\LaravelViewComponents\Components;

class H extends BaseComponent
{
    public function __construct(
        public int $number = 1,
        public ?bool $background = null,
        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
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
