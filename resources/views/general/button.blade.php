<button
    type="{{ $type }}"
    {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}
>
    {{ $slot }}
</button>
