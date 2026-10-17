<button
    type="{{ $type ?: 'button' }}"
    {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}
>
    {{ $slot }}
</button>
