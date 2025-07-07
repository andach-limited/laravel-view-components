<button
    type="{{ $type }}"
    {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}
>
    @isset($prefix)
        <span {{ $attributes->twMergeFor('prefix', $twMergeStrings['prefix']) }}>{!! $prefix !!}</span>
    @endisset
        <span {{ $attributes->twMergeFor('content', $twMergeStrings['content']) }}>{{ $slot }}</span>
    @isset($suffix)
        <span {{ $attributes->twMergeFor('suffix', $twMergeStrings['suffix']) }}>{!! $suffix !!}</span>
    @endisset
</button>
