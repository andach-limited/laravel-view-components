<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class Button extends Component
{
    public string $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $link, public string $color, public string $icon = '')
    {
        $this->class = 'font-bold py-2 px-4 rounded-lg bg-'.$color.'-500 hover:bg-'.$color.'-600 text-gray-100';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view(config('view-components.views.button'));
    }
}
