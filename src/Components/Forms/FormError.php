<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\Components\BaseComponent;
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
        public ?string $background = null,
        public ?string $border = null,
        public ?string $divide = null,
        public ?string $hollow = 'true',
        public ?string $ring = null,
        public ?string $rounded = null,
        public ?string $shadow = null,
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
