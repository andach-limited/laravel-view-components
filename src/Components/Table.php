<?php

namespace Andach\LaravelViewComponents\Components;

class Table extends BaseComponent
{
    public function __construct(
        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
    ) {
        parent::__construct();
    }

    public function render()
    {
        return view(config('view-components.views.table'));
    }
}
