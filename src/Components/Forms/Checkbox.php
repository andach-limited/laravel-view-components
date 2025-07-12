<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\BaseComponent;
use Andach\LaravelViewComponents\Traits\HandlesBoundValues;
use Andach\LaravelViewComponents\Traits\HandlesValidationErrors;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Checkbox extends BaseComponent
{
    use HandlesBoundValues;
    use HandlesValidationErrors;

    public function __construct(
        // Unique Arguments
        public string $name,
        public string $label = '',
        public string $value = '1',
        public ?bool $checked = false,
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

        $inputName = static::convertBracketsToDots(Str::before($name, '[]'));

        if ($oldData = old($inputName)) {
            $this->checked = in_array($value, Arr::wrap($oldData));
        }

        if (!session()->hasOldInput()) {
            $boundValue = $this->getBoundValue($bind, $inputName);

            if ($boundValue instanceof Arrayable) {
                $boundValue = $boundValue->toArray();
            }

            if (is_array($boundValue)) {
                $this->checked = in_array($value, $boundValue);
                return;
            }

            $this->checked = is_null($boundValue) ? $checked : $boundValue;
        }
    }

    public function render()
    {
        return view(config('view-components.views.checkbox'));
    }
}
