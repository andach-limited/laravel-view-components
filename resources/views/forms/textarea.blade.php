<div {{ $attributes->twMergeFor('base', $twMergeStrings['base']) }}>
    <label {{ $attributes->twMergeFor('label', $twMergeStrings['label']) }}>
        @if ($floating === false)
            <span {{ $attributes->twMergeFor('span', $twMergeStrings['span']) }}>{{ $label }}</span>
        @endif

        <textarea {{ $attributes->twMerge(['class' => $twMergeStrings['input']]) }}
                  name="{{ $name }}"
                  placeholder="{{ $placeholder }}">
            {{ $value }}
        </textarea>

        @if ($floating === true)
            <span {{ $attributes->twMergeFor('floating', $twMergeStrings['floating']) }}>{{ $label }}</span>
        @endif
    </label>

    @if ($hasErrorAndShow($name))
        <x-andach-form-error :name="$name" :variant="$variant" />
    @endif
</div>
