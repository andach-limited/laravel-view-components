<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <label {{ $attributes->twMergeFor('label', $twMergeStrings['label']) }}>
        <input {{ $attributes->twMergeFor('input', $twMergeStrings['input']) }}
               type="checkbox"
               value="{{ $value }}"
               name="{{ $name }}"

               @if ($checked)
                   checked="checked"
               @endif
        />

        <span class="ml-2">{{ $label }}</span>
    </label>

    @if($hasErrorAndShow($name))
        <x-andach-form-error :name="$name" />
    @endif
</div>
