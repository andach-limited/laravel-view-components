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

    public function __construct(string $component, ?string $variant)
    {
        $this->components = config('view-components.components');
        $this->variants   = config('view-components.variants');
        $this->component  = $this->components[$component];
        $this->variant = $this->variants[$variant] ?? $this->variants['default'];
        $this->buildClassNames = $this->getBuildClasses();
        $this->elementClassNames = $this->getElementClasses();
    }

    /*
     * Returns a string of all the classes required for the base item in the blade.php file based on an array of
     * attributes provided and configurable by the end user.
     */
    public function buildClasses(string $component): string
    {
        $classes = collect();
        $attributes = $this->buildClassNames;

        $baseClasses      = collect(['base' => $this->components[$component]['base'] ?? null]);
        $attributeClasses = $this->classesAttributes($component, $attributes);
        $variantClasses   = $this->classesVariant($component, $this->variantName, $attributes);
        $sizeClasses      = $this->classesSize($component, $attributes['size'] ?? null);
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

        //        dd($classes, $baseClasses, $attributeClasses, $variantClasses, $sizeClasses);

        return TailwindMerge::merge($classes->flatten()->implode(' '));
    }

    public function buildElementClasses($component, $size): array
    {
        $elementClasses = [];
        $elements = $this->elementClassNames;

        if ($elements) {
            $sizeOverride = $this->components[$component]['size'] ?? null;

            if (!$size) {
                $size = $sizeOverride ?? $size ?? null;
            }

            foreach ($elements as $elementString) {
                $elementName = Str::kebab($elementString);
                $element     = $this->components[$component]['elements'][$elementName] ?? [];

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

    private function classesAttributes(string $component, array $attributes): Collection
    {
        $componentConfigAttribute = $this->components[$component]['attributes'] ?? [];
        $enabledAttributes        = $this->enabledAttributes($component, $attributes);

        return collect($enabledAttributes)->mapWithKeys(fn ($enabledAttribute) => [$enabledAttribute => $componentConfigAttribute[$enabledAttribute][1]]);
    }

    public function classesSize($component, $size)
    {
        $sizeClasses = collect();
        $hasSize     = $this->components[$component]['sizes'][$size] ?? null;
        $base        = config('turbine.components.' . $component . '.size') ?? 'base';

        if ($hasSize) {
            $sizeClasses->put('size', $hasSize);
        } else {
            if (isset($this->components[$component]['sizes'][$base])) {
                $sizeClasses->put('size', $this->components[$component]['sizes'][$base]);
            }
        }

        return $sizeClasses ?? null;
    }

    /*
     * Pulls a selection of vlasses from the appropriate $variant section of the config file, using logic derived from
     * the provided $attributes from the Component itself ($this->arrayBuildClasses), and
     */
    private function classesVariant($component, $variant, $attributes): Collection
    {
        $hasHollow     = $attributes['hollow'] ?? null;
        $hasHover      = $this->components[$component]['options']['hover'] ?? null;
        $hasFocus      = $this->components[$component]['options']['focus'] ?? null;
        $hasGradient   = $this->components[$component]['options']['gradient'] ?? null;
        $hasBackground = $this->components[$component]['options']['background'] ?? null;
        $hasText       = $this->components[$component]['options']['text'] ?? null;
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

    /*
     * This function returns an array of names of enabled attributes for the component. Attributes are accessed via the
     * attributes array in the config file, for example:
     *
     * 'attributes' => [
     *      'accent' => [false, 'border-l-8'],
     *      'border' => [true, 'border-2'],
     *      'ring' => [false, 'ring-2 ring-offset-2'],
     *      'rounded' => [true, 'rounded'],
     *      'shadow' => [false, 'shadow-md'],
     *  ],
     *
     * Each element is an array where the first item is the default enabled/disabled status, and the second is a string
     * list of tailwind classes to include if needed.
     *
     * The attributes array (for boolean inputs) will be:
     *
     * "1"  => Set to true
     * ""   => Set to false
     * null => Use default value
     */
    private function enabledAttributes(string $component, array $attributes): Collection
    {
        $config = $this->components[$component]['attributes'] ?? [];

        return collect($config)
            ->filter(function (array $settings, string $key) use ($attributes) {
                $default = $settings[0];

                if (array_key_exists($key, $attributes)) {
                    $value = $attributes[$key];

                    if (1 === $value || '1' === $value) {
                        return true;
                    }

                    if ('' === $value) {
                        return false;
                    }

                    // null: use default
                    return true === $default;
                }

                // attribute not provided: use default
                return true === $default;
            })
            ->keys()
            ->values();
    }

    function getBuildClasses(): array
    {
        return array_key_exists('attributes', $this->component) && is_array($this->component['attributes'])
            ? array_keys($this->component['attributes'])
            : [];
    }

    function getElementClasses(): array
    {
        return array_key_exists('elements', $this->component) && is_array($this->component['elements'])
            ? array_keys($this->component['elements'])
            : [];
    }

    public function getVariant(): array
    {
        return $this->variant;
    }
}
