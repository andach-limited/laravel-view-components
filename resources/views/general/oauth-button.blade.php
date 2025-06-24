<div role="button" tabindex="0" {{ $attributes->twMerge(['class' => $classes]) }}>
    <span {{ $attributes->twMergeFor('icon', $iconClasses) }}>{!! $icon !!}</span>
    <span {{ $attributes->twMergeFor('separator', $separatorClasses) }}></span>
    <span {{ $attributes->twMergeFor('text', $textClasses) }}>{{ $slot }}</span>
</div>
