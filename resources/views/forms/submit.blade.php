<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <x-andach-button
        type="{{ $type }}"
        accent="{{ $accent }}"
        animate="{{ $animate }}"
        background="{{ $background }}"
        border="{{ $border }}"
        divide="{{ $divide }}"
        full="{{ $full }}"
        hollow="{{ $interiorHollow }}"
        hover="{{ $hover }}"
        ring="{{ $ring }}"
        rounded="{{ $rounded }}"
        shadow="{{ $shadow }}"
        size="{{ $size }}"
        variant="{{ $variant }}"
    >
        {!! trim($slot) ?: __('Submit') !!}
    </x-andach-button>
</div>
