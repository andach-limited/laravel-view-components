<?php

namespace Andach\LaravelViewComponents\Components;

use Andach\LaravelViewComponents\LaravelViewComponents;
use Closure;
use Illuminate\View\Component;

class Card extends BaseComponent
{
    protected array $arrayBuildClasses = ['border', 'divide', 'hollow', 'ring', 'rounded', 'shadow', 'size'];
    protected array $arrayElementClasses = ['body', 'header', 'footer'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $border = null,
        public ?string $classes = null,
        public ?string $divide = null,
        public ?string $hollow = null,
        public ?string $ring = null,
        public ?string $rounded = null,
        public ?string $shadow = null,
        public ?string $size = null,
        public ?string $theme = null,
        public ?string $variant = null,
        public ?string $bodyClasses = null,
        public ?string $footerClasses = null,
        public ?string $headerClasses = null,)
    {
        parent::__construct();
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
