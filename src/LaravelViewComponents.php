<?php

namespace Andach\LaravelViewComponents;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use TailwindMerge\Laravel\Facades\TailwindMerge;

class LaravelViewComponents
{
    private array $buildClassNames;

    private array $component;

    private array $components = [];

    private array $elementClassNames;

    private array $variant = [];

    private string $variantName = '';

    private array $variants = [];

    private array $vars;

    public function __construct(string $component, array $vars)
    {
        $this->variantName       = $vars['variant'] ?? 'default';
        $this->components        = config('view-components.components');
        $this->variants          = config('view-components.variants');
        $this->component         = $this->components[$component];
        $this->variant           = $this->variants[$this->variantName] ?? $this->variants['default'];
        $this->buildClassNames   = $this->getBuildClasses();
        $this->elementClassNames = $this->getElementClasses();
        $this->vars              = $vars;
    }

    /*
     * Returns a string of all the classes required for the base item in the blade.php file based on an array of
     * attributes provided and configurable by the end user.
     */
    public function buildClasses(): string
    {
        $baseClasses      = collect(['base' => $this->component['base'] ?? null]);
        $attributeClasses = $this->classesAttributes();
        $variantClasses   = $this->classesVariant();
        $sizeClasses      = $this->classesSize();
        //        $gridClasses = $this->gridClasses($component, $attributes['grid'] ?? null);
        //        $colClasses = $this->colClasses($component, $attributes['cols'] ?? null);
        //        $gapClasses = $this->gapClasses($component, $attributes['gap'] ?? null);
        $classes = $baseClasses->mergeRecursive($sizeClasses);
        $classes = $classes->mergeRecursive($variantClasses);
        $classes = $classes->mergeRecursive($attributeClasses);
        //        $classes = $classes->mergeRecursive($gridClasses);
        //        $classes = $classes->mergeRecursive($colClasses);
        //        $classes = $classes->mergeRecursive($gapClasses);

        //        $componentName = Str::camel($component);
        //        $methodName = $componentName.'Component';
        //        if (method_exists($this, $methodName)) {
        //            $classes = $this->$methodName($component, $attributes, $classes);
        //        }

        //                dd($classes, $baseClasses, $attributeClasses, $variantClasses, $sizeClasses);
        //                dd(TailwindMerge::merge($classes->flatten()->implode(' ')));

        return TailwindMerge::merge($classes->flatten()->implode(' '));
    }

    public function buildElementClasses(): array
    {
        $size           = $this->vars['size'] ?? null;
        $elementClasses = [];
        $elements       = $this->elementClassNames;

        if ($elements) {
            $sizeOverride = $this->component['size'] ?? null;

            if (!$size) {
                $size = $sizeOverride ?? $size ?? null;
            }

            foreach ($elements as $elementString) {
                $elementName = Str::kebab($elementString);
                $element     = $this->component['elements'][$elementName] ?? [];

                $base    = $element['base'] ?? null;
                $hasSize = $element['sizes'][$size] ?? null;

                if (!$hasSize) {
                    $hasSize = $element['sizes']['base'] ?? null;
                }

                $elementClasses[$elementString] = $base . ' ' . $hasSize;
            }
        }

        return $elementClasses;
    }

    private function classesAttributes(): Collection
    {
        $config = $this->component['attributes'] ?? [];
        $return = [];

        foreach ($config as $name => $classArray) {
            $enabled = $classArray[0];

            if (isset($this->vars[$name])) {
                if (null !== $this->vars[$name]) {
                    $enabled = $this->vars[$name];
                }
            }

            if ($enabled) {
                $return[$name] = $classArray[1];
            }
        }

        return collect($return);
    }

    public function classesSize(): Collection
    {
        $return       = collect();
        $selectedSize = $this->vars['size'] ?? 'base';
        $sizeString   = $this->component['sizes'][$selectedSize] ?? '';
        $return->put('size', $sizeString);

        return $return;
    }

    /*
     * Pulls a selection of classes from the appropriate $variant section of the config file, using logic derived from
     * the provided $attributes from the Component itself ($this->arrayBuildClasses), and
     */
    private function classesVariant(): Collection
    {
        $attributes = $this->buildClassNames;

        $hasHollow     = $attributes['hollow'] ?? null;
        $hasHover      = $this->component['options']['hover'] ?? null;
        $hasFocus      = $this->component['options']['focus'] ?? null;
        $hasGradient   = $this->component['options']['gradient'] ?? null;
        $hasBackground = $this->component['options']['background'] ?? null;
        $hasText       = $this->component['options']['text'] ?? null;
        $hasAccent     = $attributes['accent'] ?? null;

        if (false !== $hasBackground) {
            $backgroundEnabled = true;
        } else {
            $backgroundEnabled = false;
        }

        if (false !== $hasText) {
            $textEnabled = true;
        } else {
            $textEnabled = false;
        }

        $keysNames = [
            'background' => !$hasHollow && !$hasGradient && $backgroundEnabled,
            'text'       => true,
            'border'     => $hasAccent,
            'shadow'     => false,
            'ring'       => false,
            'hover'      => $hasHover,
            'focus'      => $hasFocus,
            'active'     => false,
            'gradient'   => $hasGradient && !$hasHollow, // Also forget text?
            'divide'     => false,
            'accent'     => true,
        ];

        //        $enabledAttributes = $this->enabledAttributes($component, $attributes);
        $variantClasses = collect();

        foreach ($keysNames as $keyName => $evaluation) {
            if (isset($this->variant[$keyName]) && $evaluation) {
                $variantClasses->put($keyName, $this->variant[$keyName]);
            }
        }

        if (!$textEnabled) {
            $variantClasses->forget('text');
        }

        return $variantClasses;
    }

    public function getBuildClasses(): array
    {
        return array_key_exists('attributes', $this->component) && is_array($this->component['attributes'])
            ? array_keys($this->component['attributes'])
            : [];
    }

    public function getElementClasses(): array
    {
        return array_key_exists('elements', $this->component) && is_array($this->component['elements'])
            ? array_keys($this->component['elements'])
            : [];
    }

    public function getTwMergeStrings(): array
    {
        return array_merge(
            ['base' => $this->buildClasses()],
            $this->buildElementClasses()
        );
    }

    public function getVariant(): array
    {
        return $this->variant;
    }
}
