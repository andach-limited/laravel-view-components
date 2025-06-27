<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <div {{ $attributes->twMergeFor('internal-div', $twMergeStrings['internal-div']) }}>
        @if ($icon)
            <p {{ $attributes->twMergeFor('icon', $twMergeStrings['icon']) }}>{!! $icon !!}</p>
        @endif
        <p {{ $attributes->twMergeFor('title', $twMergeStrings['title']) }}>{{ $title }}</p>
        {{ $slot }}
    </div>
</div>
