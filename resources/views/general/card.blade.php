{{--<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>--}}
{{--    {{ $slot }}--}}
{{--    @isset($header)--}}
{{--        <div {{ $header->attributes->twMerge($twMergeStrings['header']) }}>--}}
{{--            {{ $header }}--}}
{{--        </div>--}}
{{--    @endisset--}}
{{--    @isset($body)--}}
{{--        <div {{ $body->attributes->twMerge($twMergeStrings['body']) }}>--}}
{{--            {{ $body }}--}}
{{--        </div>--}}
{{--    @endisset--}}
{{--    @isset($footer)--}}
{{--        <div {{ $footer->attributes->twMerge($twMergeStrings['footer']) }}>--}}
{{--            {{ $footer }}--}}
{{--        </div>--}}
{{--    @endisset--}}
{{--</div>--}}

<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    {{ $slot }}
    @isset($header)
        <div {{ $header->attributes->twMerge($twMergeStrings['header']) }}>
            {{ $header }}
        </div>
    @endisset
    @isset($body)
        <div {{ $body->attributes->twMerge($twMergeStrings['body']) }}>
            {{ $body }}
        </div>
    @endisset
    @isset($footer)
        <div {{ $footer->attributes->twMerge($twMergeStrings['footer']) }}>
            {{ $footer }}
        </div>
    @endisset
</div>
