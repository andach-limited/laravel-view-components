<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <label class="block">
        @if ($label)
            <x-andach-label :label="$label" />
        @endif

        <textarea class="{{ $class }}" name="{{ $name }}" placeholder="{{ $placeholder }}">{{ $value }}</textarea>
    </label>

    @if ($hasErrorAndShow($name))
        <x-andach-form-error :name="$name" :variant="$variant" />
    @endif
</div>
