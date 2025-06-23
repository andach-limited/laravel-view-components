<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class MenuGroup extends BaseComponent
{
    protected array $arrayBuildClasses = ['border', 'ring', 'rounded', 'shadow'];
    protected array $arrayElementClasses = ['firstLi', 'parent', 'icon', 'submenuDiv', 'chevronDiv', 'chevronSvg'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $url = '',
        public ?string $title = '',
        public ?bool $selected = false,
        public ?array $items = [],
        public ?string $icon = '',

        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,

        public ?string $size = null,
        public ?string $variant = null,

        public ?string $classes = null,
        public ?string $firstLiClasses = null,
        public ?string $parentClasses = null,
        public ?string $iconClasses = null,
        public ?string $submenuDivClasses = null,
        public ?string $chevronDivClasses = null,
        public ?string $chevronSvgClasses = null,
    )
    {
        parent::__construct();

//        dd($this->data());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view(config('view-components.views.menu-group'));
    }
}
