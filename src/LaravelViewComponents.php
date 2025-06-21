<?php

namespace Andach\LaravelViewComponents;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class LaravelViewComponents
{
    private array $components = [];
    private array $variant = [];
    private string $variantName = '';
    private array $variants = [];

    public function __construct(?string $variant)
    {
        $this->components = config('view-components.components');
        $this->variants = config('view-components.variants');
        $this->setVariant($variant);
    }

    /*
     * Returns a string of all the classes required for the base item in the blade.php file based on an array of
     * attributes provided and configurable by the end user.
     */
    public function buildClasses(string $component, array $attributes): string
    {
        $classes = collect();

        $baseClasses = collect(['base' => $this->components[$component]['base'] ?? null]);
        $attributeClasses = $this->classesAttributes($component, $attributes);
        $variantClasses = $this->classesVariant($component, $this->variantName, $attributes);
        $sizeClasses = $this->classesSize($component, $attributes['size'] ?? null);
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

        return $classes->flatten()->implode(' ');
    }

    public function buildElementClasses($component, $elements = null, $size)
    {
        $elementClasses = [];

        if ($elements) {
            $sizeOverride = $this->components[$component]['size'] ?? null;

            if (!$size) {
                $size = $sizeOverride ?? $size ?? null;
            }

            foreach ($elements as $elementString) {
                $elementName = Str::kebab($elementString);
                $element = $this->components[$component]['elements'][$elementName] ?? [];

                $base = $element['base'] ?? null;
                $hasSize = $element['sizes'][$size] ?? null;

                if (!$hasSize) {
                    $hasSize = $element['sizes']['base'] ?? null;
                }

                $elementClasses[$elementString.'Classes'] = $base . ' ' . $hasSize;
            }
        }

        return $elementClasses;
    }

    private function classesAttributes(string $component, array $attributes): Collection
    {
        $componentConfigAttribute = $this->components[$component]['attributes'] ?? [];
        $enabledAttributes = $this->enabledAttributes($component, $attributes);

        return collect($enabledAttributes)->mapWithKeys(function ($enabledAttribute) use ($componentConfigAttribute) {
            return [$enabledAttribute => $componentConfigAttribute[$enabledAttribute][1]];
        });
    }

    public function classesSize($component, $size)
    {
        $sizeClasses = collect();
        $hasSize = $this->components[$component]['sizes'][$size] ?? null;
        $base = config('turbine.components.'.$component.'.size') ?? 'base';

        if ($hasSize) {
            $sizeClasses->put('size', $hasSize);
        } else {
            if (isset($this->components[$component]['sizes'][$base])) {
                $sizeClasses->put('size', $this->components[$component]['sizes'][$base]);
            }
        }

        return $sizeClasses ?? null;
    }

    private function classesVariant($component, $variant, $attributes)
    {
        $hasHollow = $attributes['hollow'] ?? null;
        $hasHover = $this->components[$component]['options']['hover'] ?? null;
        $hasFocus = $this->components[$component]['options']['focus'] ?? null;
        $hasGradient = $this->components[$component]['options']['gradient'] ?? null;
        $hasBackground = $this->components[$component]['options']['background'] ?? null;
        $hasText = $this->components[$component]['options']['text'] ?? null;
        $hasAccent = $attributes['accent'] ?? null;

        if ($hasBackground !== false) {
            $backgroundEnabled = true;
        } else {
            $backgroundEnabled = false;
        }

        if ($hasText !== false) {
            $textEnabled = true;
        } else {
            $textEnabled = false;
        }

        $enabledAttributes = $this->enabledAttributes($component, $attributes);
        $variantClasses = collect();

        if (isset($localVariant['border']) && $hasAccent) {
            $variantClasses->put('border', $localVariant['border']);
        } else {
            if (isset($this->variant['border']) && $hasAccent) {
                $variantClasses->put('border', $this->variant['border']);
            }
        }

        if (isset($localVariant['background']) && !$hasHollow && !$hasGradient && $backgroundEnabled) {
            $variantClasses->put('background', $localVariant['background']);
        } else {
            if (isset($this->variant['background']) && !$hasHollow && !$hasGradient && $backgroundEnabled) {
                $variantClasses->put('background', $this->variant['background']);
            }
        }

        if (isset($localVariant['text'])) {
            $variantClasses->put('text', $localVariant['text']);
        } else {
            if (isset($this->variant['text'])) {
                $variantClasses->put('text', $this->variant['text']);
            }
        }

        if ($hasHover) {
            if (isset($localVariant['hover'])) {
                $variantClasses->put('hover', $localVariant['hover']);
            } else {
                if (isset($this->variant['hover'])) {
                    $variantClasses->put('hover', $this->variant['hover']);
                }
            }
        }

        if ($hasFocus) {
            if (isset($localVariant['focus'])) {
                $variantClasses->put('focus', $localVariant['focus']);
            } else {
                if (isset($this->variant['focus'])) {
                    $variantClasses->put('focus', $this->variant['focus']);
                }
            }
        }

        if ($hasGradient && !$hasHollow) {
            if (isset($localVariant['gradient'])) {
                $variantClasses->put('gradient', $localVariant['gradient']);
            } else {
                if (isset($this->variant['gradient'])) {
                    $variantClasses->put('gradient', $this->variant['gradient']);
                    $variantClasses->forget('text');
                }
            }
        }

        if (isset($localVariant['accent'])) {
            $variantClasses->put('accent', $localVariant['accent']);
        } else {
            if (isset($this->variant['accent'])) {
                $variantClasses->put('accent', $this->variant['accent']);
            }
        }

        if (!$textEnabled) {
            $variantClasses->forget('text');
        }

        if ($enabledAttributes) {
            foreach ($enabledAttributes as $enabledAttribute) {
                if (isset($localVariant[$enabledAttribute])) {
                    $variantAttribute = $localVariant[$enabledAttribute] ?? null;
                } else {
                    $variantAttribute = $this->variant[$enabledAttribute] ?? null;
                }

                if ($variantAttribute) {
                    $variantClasses->put($enabledAttribute, $variantAttribute);
                }
            }
        }

        return $variantClasses ?? null;
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

                    if ($value === 1 || $value === '1') {
                        return true;
                    }

                    if ($value === '') {
                        return false;
                    }

                    // null: use default
                    return $default === true;
                }

                // attribute not provided: use default
                return $default === true;
            })
            ->keys()
            ->values();
    }

    public function setVariant(?string $variant): void
    {
        $this->variant = $this->variants[$variant] ?? $this->variants['default'];
    }
}
