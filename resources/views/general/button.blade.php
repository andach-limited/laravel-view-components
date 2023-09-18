<a href="{{ $link }}">
    <button class="{{ $class }}">
        {!! Blade::render($svg) !!}
        {{ $slot }}
    </button>
</a>
