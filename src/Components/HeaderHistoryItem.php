<?php

namespace Andach\LaravelViewComponents\Components;

use App\Models\History;
use Closure;
use Illuminate\View\Component;

class HeaderHistoryItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public History $history)
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view(config('view-components.views.header-history-item'));
    }
}
