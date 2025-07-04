<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\Components\BaseComponent;

class Form extends BaseComponent
{
    public bool $spoofMethod;
    public function __construct(
        // Unique Arguments
        public string $action,
        public string $method = 'POST',
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

        $this->spoofMethod = in_array($method, ['PUT', 'PATCH', 'DELETE']);
    }

    public function render()
    {
        return view(config('view-components.views.form'));
    }
}
