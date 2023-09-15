<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $title, public string $class = '')
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view(config('view-components.views.card'));
    }
}
