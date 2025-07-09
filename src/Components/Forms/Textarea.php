<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\Components\BaseComponent;
use Andach\LaravelViewComponents\Traits\HandlesDefaultAndOldValue;
use Andach\LaravelViewComponents\Traits\HandlesValidationErrors;
use TailwindMerge\Laravel\Facades\TailwindMerge;

class Textarea extends BaseComponent
{
    use HandlesDefaultAndOldValue;
    use HandlesValidationErrors;

    public string $class;

    public string $value = '';

    public function __construct(
        // Unique Arguments
        public string $name,
        public string $label = '',
        public string $language = '',
        public string $placeholder = '',
                      $bind = null,
                      $default = null,
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

        if ($language) {
            $this->name = "{$name}[{$language}]";
        }

        $this->value = $this->returnValue($name, $bind, $default, $language);

        $this->class = TailwindMerge::merge($this->twMergeStrings['input']);
        if ($this->hasErrorAndShow($name)) {
            $this->class = TailwindMerge::merge($this->twMergeStrings['input'], $this->variantArray['errorBorder']);
        }
    }

    public function render()
    {
        return view(config('view-components.views.textarea'));
    }
}
