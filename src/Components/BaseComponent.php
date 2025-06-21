<?php

namespace Andach\LaravelViewComponents\Components;

use Illuminate\View\Component;

abstract class BaseComponent extends Component
{
    public function __construct(public string $color = 'gray') {}

    public function colorClass(string $context, string $shade = '500', string $darkShade = '400'): string
    {
        return "{$context}-{$this->color}-{$shade} dark:{$context}-{$this->color}-{$darkShade}";
    }

    public function variantClasses(string $variant): string
    {
        return match ($variant) {
            'solid' => implode(' ', [
                $this->colorClass('bg'),
                'text-white',
                $this->colorClass('border', '600', '500'),
            ]),
            'outline' => implode(' ', [
                'bg-white dark:bg-gray-900',
                $this->colorClass('text', '700', '300'),
                $this->colorClass('border', '300', '600'),
            ]),
            default => '',
        };
    }

    public function generateIconHtml(array|string|null $icon, string $default = ''): string
    {
        if (!$icon) {
            return $default;
        }

        // Defaults
        $style = 'fa-solid';  // solid by default
        $name = '';
        $size = 'fa-sm';     // default size
        $extraClasses = '';

        if (is_string($icon)) {
            $name = $icon;
        } elseif (is_array($icon)) {
            $name = $icon['name'] ?? '';
            $style = $icon['style'] ?? $style;
            $size = $icon['size'] ?? $size;
            $extraClasses = $icon['class'] ?? '';
        }

        if (!$name) {
            return '';
        }

        $classes = trim("fa {$style} fa-{$name} {$size} {$extraClasses}");

        return "<i class=\"{$classes}\"></i>";
    }
}
