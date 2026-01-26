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
    private array $enabledAttributesFromConfig = [];

    private array $variant = [];

    private string $variantName = '';

    private array $variants = [];

    private array $vars;

    private static ?array $configCache = null;

    public function __construct(string $component, array $vars)
    {
        if (self::$configCache === null) {
            self::$configCache = [
                'components' => config('view-components.components'),
                'variants' => config('view-components.variants'),
            ];
        }

        $this->componentName     = $component;
        $this->variantName       = $vars['variant'] ?? 'default';
        $this->components        = self::$configCache['components'];
        $this->variants          = self::$configCache['variants'];
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
        $size = $this->vars['size'] ?? ($this->component['size'] ?? null);
        $elementClasses = [];
        $elements       = $this->elementClassNames ?? [];

        foreach ($elements as $elementString) {
            $elementName = Str::kebab($elementString);
            $element     = $this->component['elements'][$elementName] ?? [];

            $baseClasses = collect(['base' => $element['base'] ?? null]);
            $conditionalClasses = $this->classesElementConditional($elementName);
            $inheritClasses = $this->classesElementInherit($element);
            $sizeClasses = $this->classesElementSize($element, $size);
            $variantClasses = $this->classesElementVariant($element);

            $elementClasses[$elementString] = $this->mergeCollectionsUsingTailwind([$baseClasses, $conditionalClasses, $inheritClasses, $sizeClasses, $variantClasses]);

//            dd($baseClasses, $conditionalClasses, $sizeClasses, $elementClasses, $elementString, $element);
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

        $this->enabledAttributesFromConfig = array_keys($return);

        return collect($return);
    }

    public function classesConditional(): Collection
    {
        $classes = collect();

        if (isset($this->component['conditional']) && is_array($this->component['conditional'])) {
            foreach ($this->component['conditional'] as $key => $options) {
                $value = $this->vars[$key] ?? null;

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

            if ($value && isset($options[$value]['base'])) {
                $classes->put('base', $options[$value]['base']);
            }
        }

        return $classes;
    }

    private function classesElementInherit(array $element): Collection
    {
        $classes = collect();
        $calculatedVariantKeys = $this->calculatedVariantKeys();

        foreach ($element['inherit'] ?? [] as $inherit) {
            if (in_array($inherit, $calculatedVariantKeys)) {
                $classes->put($inherit, $this->variant[$inherit] ?? []);
            }
        }

        foreach ($element['forceInherit'] ?? [] as $inherit) {
            $classes->put($inherit, $this->variant[$inherit] ?? []);
        }

        return $classes;
    }

    private function classesElementSize(array $element, ?string $size = null): Collection
    {
        $hasSize = $element['sizes'][$size] ?? null;
        if (!$hasSize) {
            $hasSize = $element['sizes']['base'] ?? null;
        }
        return collect(['size' => $hasSize]);
    }

    private function classesElementVariant(array $element): Collection
    {
        $variantClasses = collect();

        foreach ($element['attributes'] ?? [] as $name => $options) {
            $enabled = $options[0];

            if (isset($this->vars['elementAttributes'][$name]))
            {
                $enabled = $this->vars['elementAttributes'][$name];
            }

            if ($enabled) {
                $variantClasses->put($name.'Override', $options);
                $variantClasses->put($name.'Variant', $this->variant[$name] ?? '');
            }
        }

        return $variantClasses;
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
        $variantClasses = collect();
        $calculatedAttributes = $this->calculatedVariantKeys();

        foreach ($calculatedAttributes as $name) {
            $variantClasses->put($name, $this->variant[$name]);
        }

        return $variantClasses;
    }

    /*
     * Returns an array of names of enabled attributes that also exist in the config file.
     */
    public function calculatedAttributes(): array
    {
        $return = [];
        $keysNames = $this->calculatedAttributeIncludeFlags();

        foreach ($keysNames as $keyName => $evaluation) {
            if (isset($this->component['attributes'][$keyName]) && $evaluation) {
                $return[] = $keyName;
            }
        }

        return $return;
    }

    /*
     * Returns an array of all possible attributes mapped to true or false for whether they should be included.
     */
    public function calculatedAttributeIncludeFlags(): array
    {
        $hasHollow     = $this->vars['hollow'] ?? false;
        $hasBackground = $this->component['options']['background'] ?? null;

        if (false !== $hasBackground) {
            $backgroundEnabled = true;
        } else {
            $backgroundEnabled = false;
        }

        return [
            'accent'     => in_array('accent', $this->enabledAttributesFromConfig),
            'active'     => $this->vars['active'] ?? false,
            'background' => !$hasHollow && !in_array('gradient', $this->enabledAttributesFromConfig) && $backgroundEnabled,
            'border'     => in_array('border', $this->enabledAttributesFromConfig),
            'divide'     => in_array('divide', $this->enabledAttributesFromConfig),
            'focus'      => in_array('focus', $this->enabledAttributesFromConfig),
            'gradient'   => in_array('gradient', $this->enabledAttributesFromConfig) && !$hasHollow, // Also forget text?
            'hover'      => in_array('hover', $this->enabledAttributesFromConfig),
            'pageBackground' => $this->vars['pageBackground'] ?? false,
            'ring'       => in_array('ring', $this->enabledAttributesFromConfig),
            'rounded'    => in_array('rounded', $this->enabledAttributesFromConfig),
            'shadow'     => in_array('shadow', $this->enabledAttributesFromConfig),
            'text'       => $this->component['text'] ?? true,
        ];
    }

    public function calculatedSize(): string
    {
        return $this->vars['size'] ?? ($this->component['size'] ?? 'base');
    }

    public function calculatedVariant(): string
    {
        return $this->variantName;
    }

    /*
     * Returns an array of names of enabled attributes that also exist in the variant array.
     */
    public function calculatedVariantKeys(): array
    {
        $return = [];
        $keysNames = $this->calculatedAttributeIncludeFlags();

        foreach ($keysNames as $keyName => $evaluation) {
            if (isset($this->variant[$keyName]) && $evaluation) {
                $return[] = $keyName;
            }
        }

        return $return;
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

    private function mergeCollectionsUsingTailwind(array $collections): string
    {
        $parseCollections = collect();

        foreach ($collections as $collection) {
            $parseCollections = $parseCollections->mergeRecursive($collection);
        }

        return TailwindMerge::merge($parseCollections->flatten()->implode(' '));
    }
}
