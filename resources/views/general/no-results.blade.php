<div {{ $attributes->twMerge(['class' => $classes]) }}>
    <div {{ $attributes->twMergeFor('internal-div', $internalDivClasses) }}>
        @if ($icon)
            <p {{ $attributes->twMergeFor('icon', $iconClasses) }}>{!! $icon !!}</p>
        @endif
        <p {{ $attributes->twMergeFor('title', $titleClasses) }}>{{ $title }}</p>
        {{ $slot }}
    </div>
</div>
