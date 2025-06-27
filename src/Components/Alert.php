<?php

namespace Andach\LaravelViewComponents\Components;

class Alert extends BaseComponent
{
    protected array $arrayBuildClasses = ['border', 'ring', 'rounded', 'shadow'];

    protected array $arrayElementClasses = ['content', 'dismissButton', 'dismissIcon', 'title'];

    public function __construct(
        public ?bool $dismissible = null,
        public ?bool $divide = null,
        public ?string $icon = null,
        public ?string $title = null,
        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
        public ?string $classes = null,
        public ?string $contentClasses = null,
        public ?string $dismissButtonClasses = null,
        public ?string $dismissIconClasses = null,
        public ?string $titleClasses = null,
    ) {
        parent::__construct();
    }

    public function render()
    {
        return view(config('view-components.views.alert'));
    }
}
