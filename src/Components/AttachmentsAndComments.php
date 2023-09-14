<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AttachmentsAndComments extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public mixed $model)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.attachments-and-comments');
    }
}