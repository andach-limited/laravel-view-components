<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\BaseComponent;
use Andach\LaravelViewComponents\LaravelViewComponents;
use Andach\LaravelViewComponents\Traits\HandlesDefaultAndOldValue;
use Andach\LaravelViewComponents\Traits\HandlesValidationErrors;

class Input extends BaseComponent
{
    use HandlesDefaultAndOldValue;
    use HandlesValidationErrors;

    public string $class;

    public string $value = '';

    public function __construct(
        // Unique Arguments
        public string $name,
        public bool $floating = false,
        public string $label = '',
        public string $language = '',
        public string $placeholder = '',
        public string $type = 'text',
        $bind = null,
        $default = null,
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

        if ($this->floating) {
            $this->placeholder = ' ';
        }

        if ($language) {
            $this->name = "{$name}[{$language}]";
        }

        $this->value = $this->returnValue($name, $bind, $default, $language);

        $this->class = LaravelViewComponents::merge($this->twMergeStrings['input']);

        if ($this->hasErrorAndShow($name)) {
            $this->twMergeStrings['input'] .= ' ' . $this->variantArray['errorBorder'];
        }
    }

    public function render()
    {
        return view(config('view-components.views.input'));
    }
}
