<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class Button extends Component
{
    public string $class;

    public string $svg;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $link, public string $color, public string $icon = '')
    {
        $this->class = 'font-bold py-2 px-4 rounded-lg ';
        $this->svg   = '';

        $this->class .= match ($color) {
            'blue'  => 'bg-blue-500 hover:bg-blue-600 text-white',
            default => 'bg-emerald-500 hover:bg-emerald-700 text-white',
        };

        $this->svg = '<i class="fa-solid fa-' . $icon . '"></i>';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
