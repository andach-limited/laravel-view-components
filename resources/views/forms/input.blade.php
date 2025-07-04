<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <label class="block">
        @if ($type !== 'hidden')
            <x-andach-label :label="$label" />
        @endif

        <input class="{{ $class }}"
               value="{{ $value }}"
               name="{{ $name }}"
               type="{{ $type }}" />
    </label>

    @if ($hasErrorAndShow($name))
        <x-andach-form-error :name="$name" />
    @endif
</div>
