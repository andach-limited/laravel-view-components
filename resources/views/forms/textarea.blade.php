<div {{ $attributes->twMergeFor('base', $twMergeStrings['base']) }}>
    <label {{ $attributes->twMergeFor('label', $twMergeStrings['label']) }}>
        @if ($floating === false)
            <span {{ $attributes->twMergeFor('span', $twMergeStrings['span']) }}>{{ $label }}</span>
        @endif

        {{-- No whitespace around $value: a textarea's content is its literal value, so any
             indentation here is submitted back and accumulates on each round trip. --}}
        <textarea {{ $attributes->twMerge(['class' => $twMergeStrings['input']]) }}
                  name="{{ $name }}"
                  placeholder="{{ $placeholder }}">{{ $value }}</textarea>

        @if ($floating === true)
            <span {{ $attributes->twMergeFor('floating', $twMergeStrings['floating']) }}>{{ $label }}</span>
        @endif
    </label>

    @if ($hasErrorAndShow($name))
        <x-andach-form-error :name="$name" :variant="$variant" />
    @endif
</div>
