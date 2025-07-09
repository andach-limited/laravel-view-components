<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <label {{ $attributes->twMergeFor('label', $twMergeStrings['label']) }}>
        @if ($floating === false)
            <span {{ $attributes->twMergeFor('span', $twMergeStrings['span']) }}>{{ $label }}</span>
        @endif

        <select {{ $attributes->twMergeFor('select', $twMergeStrings['select']) }}
            name="{{ $name }}"

            @if($multiple)
                multiple
            @endif

            @if($placeholder)
                placeholder="{{ $placeholder }}"
            @endif
        >

            @if($placeholder)
                <option value="" disabled @if($nothingSelected()) selected="selected" @endif>
                    {{ $placeholder }}
                </option>
            @endif

            @forelse($options as $key => $option)
                <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                    {{ $option }}
                </option>
            @empty
                {!! $slot !!}
            @endforelse
        </select>

        @if ($floating === true)
            <span {{ $attributes->twMergeFor('floating', $twMergeStrings['floating']) }}>{{ $label }}</span>
        @endif
    </label>

    @if ($hasErrorAndShow($name))
        <x-andach-form-error :name="$name" :variant="$variant" />
    @endif
</div>
