<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <label {{ $attributes->twMergeFor('label', $twMergeStrings['label']) }}>
        @if ($floating === false)
            <span {{ $attributes->twMergeFor('span', $twMergeStrings['span']) }}>{{ $label }}</span>
        @endif

        <textarea class="{{ $class }}" name="{{ $name }}" placeholder="{{ $placeholder }}">{{ $value }}</textarea>

        @if ($floating === true)
            <span {{ $attributes->twMergeFor('floating', $twMergeStrings['floating']) }}>{{ $label }}</span>
        @endif
    </label>

    @if ($hasErrorAndShow($name))
        <x-andach-form-error :name="$name" :variant="$variant" />
    @endif
</div>
