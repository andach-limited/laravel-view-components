<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCheckboxIcon extends Component
{
    public string $checkedHTML = '';

    public string $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(public string $name, public string $title, public string $value, public bool $checked, string $icon = '')
    {
        $this->icon = $icon;

        if ($checked) {
            $this->checkedHTML = 'checked';
        }

        if (!$icon) {
            $this->icon = strtolower($title);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-checkbox-icon');
    }
}
