<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NoResults extends BaseComponent
{
    public string $iconHtml = '';

    /**
     * Create a new component instance.
     */
    public function __construct(public string $title,
                                public string $variant = 'solid', public array|string|null $icon = null, string $color = 'slate')
    {
        parent::__construct($color);

        $this->iconHtml = $this->generateIconHtml($icon, '<i class="fa-regular fa-circle-xmark fa-4x bx-lg mb-5"></i>');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(config('view-components.views.no-results'));
    }
}
