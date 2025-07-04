<?php

namespace Andach\LaravelViewComponents\Components\Forms;

use Andach\LaravelViewComponents\Components\BaseComponent;
use Andach\LaravelViewComponents\Traits\HandlesDefaultAndOldValue;
use Andach\LaravelViewComponents\Traits\HandlesValidationErrors;

class Input extends BaseComponent
{
    use HandlesDefaultAndOldValue;
    use HandlesValidationErrors;

    public bool $spoofMethod = false;
    public string $value = '';

    public function __construct(
        // Unique Arguments
        public string $name,
        public string $label = '',
        public string $type = 'text',
        public bool $floating = false,
        public string $language = '',
        $bind = null,
        $default = null,
        // Generic Arguments
        public ?string $background = null,
        public ?string $border = null,
        public ?string $divide = null,
        public ?string $hollow = null,
        public ?string $ring = null,
        public ?string $rounded = null,
        public ?string $shadow = null,
        public ?string $size = null,
        public ?string $variant = null,
    ) {
        parent::__construct();

        $this->floating = $floating && $type !== 'hidden';

        if ($language) {
            $this->name = "{$name}[{$language}]";
        }

        $this->value = $this->returnValue($name, $bind, $default, $language);
    }

    public function render()
    {
        return view(config('view-components.views.input'));
    }
}
