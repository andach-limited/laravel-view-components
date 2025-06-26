<?php

namespace Andach\LaravelViewComponents\Components;

use Closure;
use Illuminate\View\Component;

class Table extends BaseComponent
{
    protected array $arrayBuildClasses = ['border', 'ring', 'rounded', 'shadow'];
    protected array $arrayElementClasses = [];
    public string $fullClasses;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?bool $border = null,
        public ?bool $ring = null,
        public ?bool $rounded = null,
        public ?bool $shadow = null,

        public ?string $size = null,
        public ?string $variant = null,

        public ?string $classes = null,
    )
    {
        parent::__construct();

//       dd($this->classes, $this->theadClasses, $this->trClasses, $this->thClasses, $this->tbodyClasses, $this->tdClasses);
        $this->compileFullClassString();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view(config('view-components.views.table'));
    }

    protected function compileFullClassString(): void
    {
        $this->fullClasses = collect([
            $this->classes,
        ])
            ->filter()
            ->implode(' ');
    }

    protected function compileIndividualClassString(?string $classString, string $prefix): ?string
    {
        if (!$classString) return null;

        return collect(explode(' ', trim($classString)))
            ->filter()
            ->map(fn($cls) => $prefix . $cls)
            ->implode(' ');
    }
}
