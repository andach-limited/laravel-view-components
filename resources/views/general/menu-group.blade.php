<ul {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    @foreach ($items as $groupName => $groupArray)
        <li {{ $attributes->twMergeFor('firstLi', $twMergeStrings['first-li']) }}
            @isset($groupArray['items'])
                @if ($groupArray['selected'] ?? false)
                    x-data="{ open: true }"
                @else
                    x-data="{ open: false }"
                @endif
            @endisset
        >
            @isset($groupArray['items'])
                <a href="#" @click.prevent="open = !open"
                   @if ($groupArray['selected'] ?? false)
                       {{ $attributes->twMergeFor('parent', [$twMergeStrings['parent'], $twMergeStrings['a-selected']]) }}
                   @else
                       {{ $attributes->twMergeFor('parent', $twMergeStrings['parent']) }}
                    @endif
                >
                    @isset($groupArray['icon'])
                        {!! $groupArray['icon'] !!}
                    @endisset
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ $groupName }}</span>
                    <svg {{ $attributes->twMergeFor('chevronSvg', $twMergeStrings['chevron-svg']) }} :class="{ 'rotate-180': open, 'rotate-0': !open }" viewBox="0 0 12 12">
                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                    </svg>
                </a>

                <ul x-show="open" x-transition {{ $attributes->twMergeFor('submenuDiv', $twMergeStrings['submenu-div']) }}>
                    @foreach ($groupArray['items'] as $submenuName => $submenuUrl)
                        @php
                            $currentUrl = url()->current();
                            $isActive = strtok($submenuUrl, '?') === $currentUrl;

                            $secondLiAppend = $attributes->twMergeFor('secondLi', $twMergeStrings['second-li']);
                            if ($isActive)
                            {
                                $secondLiAppend = $attributes->twMergeFor('secondLi', [$twMergeStrings['second-li'], $twMergeStrings['a-selected']]);
                            }
                        @endphp
                        <li>
                            <a href="{{ $submenuUrl }}" {{ $secondLiAppend }}">{{ $submenuName }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <a href="{{ $groupArray['url'] }}" {{ $attributes->twMergeFor('parent', $twMergeStrings['parent']) }}>
                    @isset($groupArray['icon'])
                        {!! $groupArray['icon'] !!}
                    @endisset
                    <span class="ms-3">{{ $groupName }}</span>
                </a>
            @endisset
        </li>
    @endforeach
</ul>
