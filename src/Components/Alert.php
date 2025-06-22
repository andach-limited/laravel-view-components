<?php

namespace Andach\LaravelViewComponents\Components;

use Andach\LaravelViewComponents\LaravelViewComponents;
use Closure;
use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        public ?bool $border = null,
        public ?string $classes = null,
        public ?bool $dismissible = null,
        public ?string $icon = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        public ?string $size = null,
        public ?string $title = null,
        public ?string $variant = null,
        public ?string $contentClasses = null,
        public ?string $dismissButtonClasses = null,
        public ?string $dismissIconClasses = null,
        public ?string $titleClasses = null,
    ) {
        $lvc = new LaravelViewComponents($variant);

        $this->classes = $lvc->buildClasses(
            'alert',
            [
                'border' => $border,
                'ring' => $ring,
                'rounded' => $rounded,
                'shadow' => $shadow,
                'size' => $size,
            ]
        );

        $elementClasses = $lvc->buildElementClasses(
            'alert',
            [
                'content',
                'dismissButton',
                'dismissIcon',
                'title',
            ],
            $size,
        );

        foreach ($elementClasses as $key => $value) {
            $this->$key = $value;
        }
    }

    public function render()
    {
        return view(config('view-components.views.alert'));
    }
}
