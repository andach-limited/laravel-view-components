<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Chat extends Component
{
    public string $classInner = 'text-sm bg-gray-100 dark:bg-slate-800 text-slate-800 dark:text-slate-100 p-3 rounded-lg rounded-tl-none border border-slate-200 dark:border-slate-700 shadow-md mb-1';

    public string $classOuter = 'flex items-start mb-4 last:mb-0';

    /**
     * Create a new component instance.
     */
    public function __construct(public string $name, public string $time, public string $picture, public bool $me = false)
    {
        if ($me) {
            $this->classInner = 'text-sm bg-indigo-500 text-gray-100 p-3 rounded-lg rounded-tl-none border border-transparent shadow-md mb-1';
            $this->classOuter = 'flex items-start justify-end text-right mb-4 last:mb-0"';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(config('view-components.views.chat'));
    }
}
