<?php

namespace Andach\LaravelViewComponents;

use ErrorException;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use RuntimeException;

abstract class BaseComponent extends Component
{
    protected array $arrayBuildClasses;

    protected array $arrayElementClasses;
    protected array $calculatedAttributes;
    protected string $calculatedSize;
    protected string $calculatedVariant;

    protected static array $lvcCache = [];

    protected array $sizes = ['9xl', '8xl', '7xl', '6xl', '5xl', '4xl', '3xl', '2xl', 'xl', 'lg', 'base', 'sm', 'xs'];

    public array $twMergeStrings = [];

    protected array $variantArray;

    public function __construct()
    {
        $cacheKey = $this->getClassName() . md5(serialize(get_object_vars($this)));

        if (isset(self::$lvcCache[$cacheKey])) {
            $cached = self::$lvcCache[$cacheKey];
            $this->twMergeStrings = $cached['twMergeStrings'];
            $this->variantArray = $cached['variantArray'];
            $this->calculatedAttributes = $cached['calculatedAttributes'];
            $this->calculatedSize = $cached['calculatedSize'];
            $this->calculatedVariant = $cached['calculatedVariant'];

            return;
        }

        try {
            $lvc                  = new LaravelViewComponents($this->getClassName(), get_object_vars($this));
            $this->twMergeStrings = $lvc->getTwMergeStrings();
            $this->variantArray   = $lvc->getVariant();
            $this->calculatedAttributes = $lvc->calculatedAttributes();
            $this->calculatedSize = $lvc->calculatedSize();
            $this->calculatedVariant = $lvc->calculatedVariant();

            self::$lvcCache[$cacheKey] = [
                'twMergeStrings' => $this->twMergeStrings,
                'variantArray' => $this->variantArray,
                'calculatedAttributes' => $this->calculatedAttributes,
                'calculatedSize' => $this->calculatedSize,
                'calculatedVariant' => $this->calculatedVariant,
            ];
        } catch (ErrorException $e) {
            if (str_contains($e->getMessage(), 'Undefined array key')) {
                throw new RuntimeException('Configuration error: Missing expected key in the config array. Please check your configuration.', 0, $e);
            }
            throw $e;
        }
    }

    protected function extractTextSize(string $classString): ?string
    {
        if (preg_match('/\btext-([a-z0-9]+)\b/', $classString, $matches)) {
            return $matches[1];
        }

        return null;
    }

    protected function getClassName(): string
    {
        return Str::of(class_basename(static::class))->snake('-');
    }

    protected function getSizeIndex(string $size): ?int
    {
        return array_search($size, $this->sizes, true);
    }

    private function setFormValue(
        string $name,
        $bind = null,
        $default = null,
        $language = null
    ) {
        $inputName = static::convertBracketsToDots($name);

        if (!$language) {
            $boundValue = $this->getBoundValue($bind, $inputName);

            $default = is_null($boundValue) ? $default : $boundValue;

            return $this->value = old($inputName, $default);
        }

        if (false !== $bind) {
            $bind = $bind ?: $this->getBoundTarget();
        }

        if ($bind) {
            $default = $bind->getTranslation($name, $language, false) ?: $default;
        }

        $this->value = old("{$inputName}.{$language}", $default);
    }

    protected static function convertBracketsToDots($name): string
    {
        return str_replace(['[', ']'], ['.', ''], $name);
    }

    protected function setAttributeBooleans()
    {
        $varNames = [
            'accent',
            'animate',
            'background',
            'border',
            'divide',
            'full',
            'hollow',
            'hover',
            'ring',
            'rounded',
            'shadow',
        ];

        foreach ($varNames as $varName) {
            if (in_array($varName, $this->calculatedAttributes)) {
                $this->{$varName} = 'true';
            }
        }

        $this->size = $this->calculatedSize;
        $this->variant = $this->calculatedVariant;
    }
}
