<?php

namespace Andach\LaravelViewComponents\Components;

class OauthButton extends BaseComponent
{
    public function __construct(
        // Unique Arguments
        public ?string $icon = null,
        public ?string $url = null,
        // Attribute Arguments
        public ?bool $background = null,
        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        // Generic Arguments
        public ?string $size = null,
        public ?string $variant = null,
    ) {
        parent::__construct();
    }

    public function render()
    {
        return view(config('view-components.views.oauth-button'));
    }
}
