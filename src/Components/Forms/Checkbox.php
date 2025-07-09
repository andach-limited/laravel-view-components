<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\Components\BaseComponent;
use Andach\LaravelViewComponents\Traits\HandlesBoundValues;
use Andach\LaravelViewComponents\Traits\HandlesDefaultAndOldValue;
use Andach\LaravelViewComponents\Traits\HandlesValidationErrors;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use TailwindMerge\Laravel\Facades\TailwindMerge;

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
