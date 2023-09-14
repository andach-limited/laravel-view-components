<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class MenuGroup extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $menuParentRoute, public string $menuGroupName, public string $currentlySelected, public array $menuArray, public string $menuSvg)
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view('components.menu-group');
    }
}
