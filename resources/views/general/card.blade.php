<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    {{ $slot }}
    @isset($header)
        <div {{ $attributes->twMergeFor('header', $twMergeStrings['header']) }}>
            {{ $header }}
        </div>
    @endisset
    @isset($body)
        <div {{ $attributes->twMergeFor('body', $twMergeStrings['body']) }}>
            {{ $body }}
        </div>
    @endisset
    @isset($footer)
        <div {{ $attributes->twMergeFor('footer', $twMergeStrings['footer']) }}>
            {{ $footer }}
        </div>
    @endisset
</div>
