<?php

namespace Andach\LaravelViewComponents;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use TailwindMerge\Laravel\Facades\TailwindMerge;

class LaravelViewComponents
{
    // An array of strings of the names of the options available under 'attributes' in the config file.
    private array $buildClassNames;

    private array $component;

    private string $componentName;

    private array $components = [];

    private array $elementClassNames;

    // A subset of $buildClassNames giving only the attributes that are enabled, accounting for overrides.
    private array $enabledAttributes;

    private array $variant = [];

    private string $variantName = '';

    private array $variants = [];

    private array $vars;

    public function __construct(string $component, array $vars)
    {
        $this->componentName     = $component;
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
        $conditionalClasses = $this->classesConditional();
        $sizeClasses      = $this->classesSize();
        $variantClasses   = $this->classesVariant();
        //        $gridClasses = $this->gridClasses($component, $attributes['grid'] ?? null);
        //        $colClasses = $this->colClasses($component, $attributes['cols'] ?? null);
        //        $gapClasses = $this->gapClasses($component, $attributes['gap'] ?? null);
        $classes = $baseClasses->mergeRecursive($sizeClasses);
        $classes = $classes->mergeRecursive($variantClasses);
        $classes = $classes->mergeRecursive($attributeClasses);
        $classes = $classes->mergeRecursive($conditionalClasses);
        //        $classes = $classes->mergeRecursive($gridClasses);
        //        $classes = $classes->mergeRecursive($colClasses);
        //        $classes = $classes->mergeRecursive($gapClasses);

        //        $componentName = Str::camel($component);
        //        $methodName = $componentName.'Component';
        //        if (method_exists($this, $methodName)) {
        //            $classes = $this->$methodName($component, $attributes, $classes);
        //        }

//                dd($classes, $classes->flatten(), $baseClasses, $attributeClasses, $conditionalClasses, $sizeClasses, $variantClasses, TailwindMerge::merge($classes->flatten()->implode(' ')));

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

                $baseClasses = collect(['base' => $element['base'] ?? null]);
                $conditional = $this->classesElementConditional($elementName);

                $hasSize = $element['sizes'][$size] ?? null;
                if (!$hasSize) {
                    $hasSize = $element['sizes']['base'] ?? null;
                }
                $sized = collect(['size' => $hasSize]);

                $classes = $baseClasses
                    ->mergeRecursive($conditional)
                    ->mergeRecursive($sized);

//                dd($element,
//                    $sizeOverride,
//                    $baseClasses,
//                    $conditional,
//                    $sized,
//                    $classes,
//                    $classes->flatten()->implode(' '),
//                    TailwindMerge::merge($classes->flatten()->implode(' ')),
//                    );

                $elementClasses[$elementString] = TailwindMerge::merge($classes->flatten()->implode(' '));
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

        $this->enabledAttributes = array_keys($return);

        return collect($return);
    }

    public function classesConditional(): Collection
    {
        $classes = collect();

        if (isset($this->component['conditional']) && is_array($this->component['conditional'])) {
            foreach ($this->component['conditional'] as $key => $options) {
                $value = $this->vars[$key] ?? null;

//                dd($key, $options, $value, $this->vars, $options[$value]);

                if ($value && isset($options[$value]['base'])) {
                    $classes->put('conditional', $options[$value]['base']);
                }
            }
        }

        return $classes->filter()->unique()->values();
    }

    public function classesElementConditional(string $elementName): Collection
    {
        $classes = collect();
        $element     = $this->component['conditional-elements'][$elementName] ?? [];

        foreach ($element as $key => $options) {
            $value = $this->vars[$key] ?? null;

//                dd($key, $options, $value, $this->vars, $options[$value]);

            if ($value && isset($options[$value]['base'])) {
                $classes->put('base', $options[$value]['base']);
            }
        }

        return $classes;
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

        $hasAccent     = $this->vars['accent'] ?? false;
        $hasBackground = $this->component['options']['divide'] ?? null;
        $hasHollow     = $this->vars['hollow'] ?? false;
        $hasHover      = $this->component['options']['hover'] ?? null;
        $hasFocus      = $this->component['options']['focus'] ?? null;
        $hasGradient   = $this->component['options']['gradient'] ?? null;
        $hasBackground = $this->component['options']['background'] ?? null;
        $hasText       = $this->component['options']['text'] ?? null;

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
            'text'       => $this->component['text'] ?? true,
            'border'     => in_array('border', $this->enabledAttributes),
            'shadow'     => in_array('shadow', $this->enabledAttributes),
            'ring'       => in_array('ring', $this->enabledAttributes),
            'hover'      => $hasHover,
            'focus'      => $hasFocus,
            'active'     => false,
            'gradient'   => $hasGradient && !$hasHollow, // Also forget text?
            'divide'     => in_array('divide', $this->enabledAttributes),
            'accent'     => $hasAccent,
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
