<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    <label class="block">
        @if ($type !== 'hidden')
            <x-andach-label :label="$label" />
        @endif

        <input {{ $attributes->twMergeFor('content', $twMergeStrings['input']) }}
               value="{{ $value }}"
               name="{{ $name }}"
               type="{{ $type }}" />
    </label>

    @if($hasErrorAndShow($name))
{{--        <x-form-errors :name="$name" />--}}
    @endif
</div>
