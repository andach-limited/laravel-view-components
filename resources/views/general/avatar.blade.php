@if ($label)
    <div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
        <div {{ $attributes->twMergeFor('label', $twMergeStrings['label']) }}>
            {{ $label }}
        </div>
    </div>
@else
    <img {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }} src="{{ $img }}" alt="{{ $alt }}">
@endif
