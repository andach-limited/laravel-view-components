<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProgressBarItem extends Component
{
    public string $class;

    /**
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function __construct(public string $href, public string $color = '', public bool $selected = false)
    {
        $class  = 'flex items-center justify-center p-2 rounded-full text-xs font-semibold ';

        if ($selected) {
            $append = 'bg-blue-600 text-white';
        } else {
            $append = 'bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400';
        }

        $this->class = $class . $append;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress-bar-item');
    }
}
