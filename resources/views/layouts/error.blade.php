<body {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <div {{ $attributes->twMergeFor('div', $twMergeStrings['div']) }}>
        <div {{ $attributes->twMergeFor('number', $twMergeStrings['number']) }}>
            <h1>{{ $number }}</h1>
        </div>

        <div {{ $attributes->twMergeFor('subtitle', $twMergeStrings['subtitle']) }}>
            <h2>{{ $subtitle }}</h2>
        </div>

        <div {{ $attributes->twMergeFor('content', $twMergeStrings['content']) }}>
            {{ $slot }}
        </div>

        <div {{ $attributes->twMergeFor('back', $twMergeStrings['back']) }}>
            <a href="/">Go back home</a>
        </div>

        <div {{ $attributes->twMergeFor('logo', $twMergeStrings['logo']) }}>
            <img src="{{ $logo }}" alt="" {{ $attributes->twMergeFor('img', $twMergeStrings['img']) }}>
        </div>
    </div>
</body>
