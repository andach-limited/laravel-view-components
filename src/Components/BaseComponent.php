<?php

namespace Andach\LaravelViewComponents\Components;

use Andach\LaravelViewComponents\LaravelViewComponents;
use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class BaseComponent extends Component
{
    protected array $arrayBuildClasses;
    protected array $arrayElementClasses;
    protected array $sizes = ['9xl', '8xl', '7xl', '6xl', '5xl', '4xl', '3xl', '2xl', 'xl', 'lg', 'base', 'sm', 'xs'];
    protected array $variantArray;

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

        $this->variantArray = $lvc->getVariant();
    }

    protected function extractTextSize(string $classString): ?string
    {
        if (preg_match('/\btext-([a-z0-9]+)\b/', $classString, $matches)) {
            return $matches[1];
        }

        return null;
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

    protected function getSizeIndex(string $size): ?int
    {
        return array_search($size, $this->sizes, true);
    }
}
