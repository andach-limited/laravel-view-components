<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\BaseComponent;
use Illuminate\Support\Str;
use TailwindMerge\Laravel\Facades\TailwindMerge;

class FormError extends BaseComponent
{
    public string $class;

    public function __construct(
        // Unique Arguments
        public string $name,
        public string $bag = 'default',
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
        public ?bool $hollow = true,
        public ?bool $hover = null,
        public ?bool $pageBackground = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
    ) {
        parent::__construct();

        $this->name  = static::convertBracketsToDots(Str::before($name, '[]'));
        $this->class = TailwindMerge::merge($this->twMergeStrings['base'], $this->variantArray['errorText']);
    }

    public function render()
    {
        return view(config('view-components.views.form-error'));
    }
}
