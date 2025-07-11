<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <div {{ $attributes->twMergeFor('inner-div', $twMergeStrings['inner-div']) }}>
        {{ $slot }}
    </div>
</div>
