<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\BaseComponent;

class Form extends BaseComponent
{
    public bool $spoofMethod;

    public function __construct(
        // Unique Arguments
        public string $action,
        public string $method = 'POST',
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

        $this->spoofMethod = in_array($method, ['PUT', 'PATCH', 'DELETE']);
    }

    public function render()
    {
        return view(config('view-components.views.form'));
    }
}
