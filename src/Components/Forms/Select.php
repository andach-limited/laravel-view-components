<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\BaseComponent;
use Andach\LaravelViewComponents\Traits\HandlesBoundValues;
use Andach\LaravelViewComponents\Traits\HandlesValidationErrors;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Select extends BaseComponent
{
    use HandlesBoundValues;
    use HandlesValidationErrors;

    public $selectedKey;

    public function __construct(
        public string $name,
        public bool $blank = false,
        public bool $floating = false,
        public string $label = '',
        public array $options = [],
               $bind = null,
               $default = null,
        public bool $multiple = false,
        public string $placeholder = '',
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

        if (is_null($default)) {
            $default = $this->getBoundValue($bind, $inputName);
        }

        $this->selectedKey = old($inputName, $default);

        if ($this->selectedKey instanceof Arrayable) {
            $this->selectedKey = $this->selectedKey->toArray();
        }

        if ($this->blank)
        {
            $this->options = ['' => ''] + $this->options;
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
