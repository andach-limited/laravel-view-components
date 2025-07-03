<details {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    @isset($question)
        <summary {{ $attributes->twMergeFor('question', $twMergeStrings['question']) }}>
            <div>{{ $question }}</div>
            <svg viewBox="0 0 10 10" {{ $attributes->twMergeFor('expand-icon', $twMergeStrings['expand-icon']) }}>
                <polygon points="10 2.5 7.5 0 5 2.5 2.5 0 0 2.5 2.5 5 0 7.5 2.5 10 5 7.5 7.5 10 10 7.5 7.5 5 10 2.5"/>
            </svg>
        </summary>
    @endisset
    @isset($answer)
        <div {{ $attributes->twMergeFor('answer', $twMergeStrings['answer']) }}>
            {{ $answer }}
        </div>
    @endisset
</details>
