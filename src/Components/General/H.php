<?php

namespace Andach\LaravelViewComponents\Components\General;

use Andach\LaravelViewComponents\BaseComponent;

class H extends BaseComponent
{
    public function __construct(
        // Unique Arguments
        public int $number = 1,
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

        // Only h1-h6 exist. Anything outside that range produced tags like <h0>/<h7>, and a large
        // enough number ran off the end of $this->sizes and threw.
        $this->number = max(1, min(6, $number));

        $sizeClass = $this->extractTextSize(config('view-components.components.h.base'));
        $sizeIndex = null === $sizeClass ? null : $this->getSizeIndex($sizeClass);

        if (null !== $sizeIndex) {
            $newSizeIndex = min($sizeIndex + $this->number - 1, count($this->sizes) - 1);

            $this->twMergeStrings['base'] .= ' text-' . $this->sizes[$newSizeIndex];
        }
    }

    public function render()
    {
        return view(config('view-components.views.h'));
    }
}
