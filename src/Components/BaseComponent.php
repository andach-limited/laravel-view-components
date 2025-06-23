<?php

namespace Andach\LaravelViewComponents\Components;

use Andach\LaravelViewComponents\LaravelViewComponents;
use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class BaseComponent extends Component
{
    protected array $arrayBuildClasses;
    protected array $arrayElementClasses;

    public function __construct()
    {
        $vars = get_object_vars($this);
        $size = $vars['size'] ?? null;
        $variant = $vars['variant'] ?? null;

        $lvc = new LaravelViewComponents($variant);

        $this->classes = $lvc->buildClasses($this->getClassName(), $this->getArrayBuildClasses());

        $elementClasses = $lvc->buildElementClasses($this->getClassName(), $this->arrayElementClasses, $size);

        foreach ($elementClasses as $key => $value) {
            $this->$key = $value;
        }
    }

    private function getArrayBuildClasses(): array
    {
        $allProps = get_object_vars($this);
        return array_intersect_key($allProps, array_flip($this->arrayBuildClasses));
    }

    private function getClassName(): string
    {
        return Str::of(class_basename(static::class))->snake('-');
    }
}
