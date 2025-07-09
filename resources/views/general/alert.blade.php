<div x-transition x-transition.duration.300ms x-data="{ open: true }" x-show="open" {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    @isset($icon)
        {!! $icon !!}
    @endisset

    <div {{ $attributes->twMergeFor('content', $twMergeStrings['content']) }}>
        @isset($title)
            <h3 {{ $attributes->twMergeFor('title', $twMergeStrings['title']) }}>{{ $title }}</h3>
        @endisset
        @if($slot->isNotEmpty())
            <span>{{ $slot }}</span>
        @endif
    </div>

    @isset($dismissible)
        <button @click="open = false" {{ $attributes->twMergeFor('dismiss-button', 'lvc-alert-dismiss '.$twMergeStrings['dismiss-button']) }}>
            <svg viewBox="0 0 10 10" {{ $attributes->twMergeFor('dismiss-icon', $twMergeStrings['dismiss-icon']) }}>
                <polygon points="10 2.5 7.5 0 5 2.5 2.5 0 0 2.5 2.5 5 0 7.5 2.5 10 5 7.5 7.5 10 10 7.5 7.5 5 10 2.5"/>
            </svg>
        </button>
    @endisset
</div>

@once
    <script src="{{ asset('vendor/view-components/laravel-view-components.js') }}"></script>
@endonce
