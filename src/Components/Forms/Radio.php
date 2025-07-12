<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\BaseComponent;
use Andach\LaravelViewComponents\Traits\HandlesBoundValues;
use Andach\LaravelViewComponents\Traits\HandlesValidationErrors;

class Radio extends BaseComponent
{
    use HandlesBoundValues;
    use HandlesValidationErrors;

    public function __construct(
        // Unique Arguments
        public string $name,
        public string $label = '',
        public string $value = '1',
        public bool $checked = false,
                      $bind = null,
        public bool $default = false,
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

        $inputName = static::convertBracketsToDots($name);

        if (old($inputName) !== null) {
            $this->checked = old($inputName) == $value;
        }

        if (!session()->hasOldInput()) {
            $boundValue = $this->getBoundValue($bind, $inputName);

            if (!is_null($boundValue)) {
                $this->checked = $boundValue == $this->value;
            }
        }
    }

    public function render()
    {
        return view(config('view-components.views.radio'));
    }
}
