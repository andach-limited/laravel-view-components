<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Route;
use Illuminate\View\Component;

class OauthButton extends BaseComponent
{
    public string $iconHtml = '';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $url,
        string $color = 'blue',
        public string $variant = 'solid',
        public array|string|null $icon = null)
    {
        parent::__construct($color);

        $this->iconHtml = $this->generateIconHtml($icon);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(config('view-components.views.oauth-button'));
    }
}
