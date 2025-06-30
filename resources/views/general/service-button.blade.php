<div role="button" tabindex="0" {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <span {{ $attributes->twMergeFor('icon', $twMergeStrings['icon']) }}>{!! $icon !!}</span>
    <span {{ $attributes->twMergeFor('separator', $twMergeStrings['separator']) }}></span>
    <span {{ $attributes->twMergeFor('text', $twMergeStrings['text']) }}>{{ $slot }}</span>
</div>
