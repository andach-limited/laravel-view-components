<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <label class="block">
        @if ($label)
            <x-andach-label :label="$label" />
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
    </label>

    @if ($hasErrorAndShow($name))
        <x-andach-form-error :name="$name" :variant="$variant" />
    @endif
</div>
