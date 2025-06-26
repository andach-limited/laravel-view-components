<ol {{ $attributes->twMerge(['class' => $classes]) }}>
    @foreach ($items as $item)
        @php
            $merge = [$liClasses];

            if ($count <= count($items))
            {
                $merge[] = $liNotLastClasses;
            }

            if ($item['complete'] ?? false)
            {
                $merge[] = $liCompleteClasses;
            } else {
                $merge[] = $liIncompleteClasses;
            }
        @endphp
        <li {{ $attributes->twMergeFor('li', $merge) }}>
                @if ($item['icon'] ?? false)
                    <span {{ $attributes->twMergeFor('iconSpan', $iconSpanClasses) }}>
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
