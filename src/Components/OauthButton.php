<?php

namespace Andach\LaravelViewComponents\Components;

class OauthButton extends BaseComponent
{
    protected array $arrayBuildClasses = ['background', 'border', 'ring', 'rounded', 'shadow'];

    protected array $arrayElementClasses = ['icon', 'separator', 'text'];

    public function __construct(
        public ?string $icon = null,
        public ?string $url = null,
        public ?bool $background = null,
        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
        public ?string $classes = null,
        public ?string $iconClasses = null,
        public ?string $separatorClasses = null,
        public ?string $textClasses = null,
    ) {
        parent::__construct();
    }

    public function render()
    {
        return view(config('view-components.views.oauth-button'));
    }
}
