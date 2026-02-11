<header {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <div {{ $attributes->twMergeFor('div', $twMergeStrings['div']) }}>
        {{ $slot }}
    </div>
</header>
