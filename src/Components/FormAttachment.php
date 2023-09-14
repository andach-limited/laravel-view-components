<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormAttachment extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $object, public string $name, public string $displayName = '')
    {
        if (!$displayName) {
            $this->displayName = $name;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-attachment');
    }
}
