<?php

namespace Andach\LaravelViewComponents\Components;

use App\Models\Search;
use Closure;
use Illuminate\View\Component;

class HeaderSearchItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Search $search)
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view(config('view-components.views.header-search-item'));
    }
}
