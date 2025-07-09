<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <label {{ $attributes->twMergeFor('label', $twMergeStrings['label']) }}>
        @if ($type !== 'hidden' && $floating === false)
            <span {{ $attributes->twMergeFor('span', $twMergeStrings['span']) }}>{{ $label }}</span>
        @endif

        <input class="{{ $class }}"
               value="{{ $value }}"
               name="{{ $name }}"
               placeholder="{{ $placeholder }}"
               type="{{ $type }}" />

        @if ($type !== 'hidden' && $floating === true)
            <span {{ $attributes->twMergeFor('floating', $twMergeStrings['floating']) }}>{{ $label }}</span>
        @endif
    </label>

    @if ($hasErrorAndShow($name))
        <x-andach-form-error :name="$name" :variant="$variant" />
    @endif
</div>
