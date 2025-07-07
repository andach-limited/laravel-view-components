<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\Components\BaseComponent;
use Andach\LaravelViewComponents\Traits\HandlesBoundValues;
use Andach\LaravelViewComponents\Traits\HandlesDefaultAndOldValue;
use Andach\LaravelViewComponents\Traits\HandlesValidationErrors;
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
        public bool $checked = false,
        $bind = null,
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
    }

    public function render()
    {
        return view(config('view-components.views.checkbox'));
    }
}
