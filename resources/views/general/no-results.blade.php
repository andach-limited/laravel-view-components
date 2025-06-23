<div {{ $attributes->twMerge(['class' => $classes]) }}>
    <div {{ $attributes->twMergeFor('internal-div', $internalDivClasses) }}>
        <p {{ $attributes->twMergeFor('icon', $iconClasses) }}>{!! $icon !!}</p>
        <p {{ $attributes->twMergeFor('title', $titleClasses) }}>{{ $title }}</p>
        {{ $slot }}
    </div>
</div>
