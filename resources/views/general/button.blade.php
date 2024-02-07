<a href="{{ $link }}">
    <button class="{{ $class }}">
        @if ($icon)
            <i class="{{ $icon }}"></i>
        @endif
        {{ $slot }}
    </button>
</a>
