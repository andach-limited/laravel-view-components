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

class Select extends BaseComponent
{
    use HandlesBoundValues;
    use HandlesValidationErrors;

    public $selectedKey;

    public function __construct(
        public string $name,
        public string $label = '',
        public array $options = [],
               $bind = null,
               $default = null,
        public bool $multiple = false,
        public string $placeholder = '',
        // Generic Arguments
        public ?string $accent = null,
        public ?string $animate = null,
        public ?string $background = null,
        public ?string $border = null,
        public ?string $divide = null,
        public ?string $full = null,
        public ?string $hollow = 'true',
        public ?string $hover = null,
        public ?string $ring = null,
        public ?string $rounded = null,
        public ?string $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
    ) {
        parent::__construct();

        $inputName = static::convertBracketsToDots(Str::before($name, '[]'));

        if (is_null($default)) {
            $default = $this->getBoundValue($bind, $inputName);
        }

        $this->selectedKey = old($inputName, $default);

        if ($this->selectedKey instanceof Arrayable) {
            $this->selectedKey = $this->selectedKey->toArray();
        }
    }

    public function isSelected($key): bool
    {
        return in_array($key, Arr::wrap($this->selectedKey));
    }

    public function nothingSelected(): bool
    {        return is_array($this->selectedKey) ? empty($this->selectedKey) : is_null($this->selectedKey);
    }

    public function render()
    {
        return view(config('view-components.views.select'));
    }
}
