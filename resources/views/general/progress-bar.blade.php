<ol {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    @foreach ($items as $item)
        @php
            $merge = [$twMergeStrings['li']];

            if ($count <= count($items))
            {
                $merge[] = $twMergeStrings['li-not-last'];
            }

            if ($item['complete'] ?? false)
            {
                $merge[] = $twMergeStrings['li-complete'];
            } else {
                $merge[] = $twMergeStrings['li-incomplete'];
            }
        @endphp
        <li {{ $attributes->twMergeFor('li', $merge) }}>
                @if ($item['icon'] ?? false)
                    <span {{ $attributes->twMergeFor('iconSpan', $twMergeStrings['icon-span']) }}>
                        {!! $item['icon'] !!}
                    </span>
                @endif

            @if ($item['text'] ?? false)
                {{ $item['text'] }}
            @endif

            @php
                $count++;
            @endphp
        </li>
    @endforeach
</ol>
