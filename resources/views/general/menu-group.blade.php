<ul {{ $attributes->twMerge(['class' => $classes]) }}>
    @foreach ($items as $groupName => $groupArray)
        @php
            $firstLiClassesAppend = '';
            if ($groupArray['selected'] ?? false) {
                $firstLiClassesAppend .= '  ring-2 ring-offset-1 ring-slate-500';
            }
        @endphp

        <li {{ $attributes->twMergeFor('firstLi', $firstLiClasses . $firstLiClassesAppend) }} x-data="{ open: @if($groupArray['selected'] ?? false) true @else false @endif }">
            @if (isset($groupArray[$url]))
                <a {{ $attributes->twMergeFor('parent', $parentClasses) }} href="{{ $groupArray[$url] }}" >
            @else
                <a {{ $attributes->twMergeFor('parent', $parentClasses) }} href="#" @click.prevent="open = !open; sidebarExpanded = true">
            @endif
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        @isset($groupArray['icon'])
                            {!! $groupArray['icon'] !!}
                        @endisset
                        <span {{ $attributes->twMergeFor('icon', $iconClasses) }}>{{ $groupName }}</span>
                    </div>
                    @if (isset($groupArray['items']))
                        <!-- Chevron -->
                        <div {{ $attributes->twMergeFor('chevronDiv', $chevronDivClasses) }}>
                            <svg {{ $attributes->twMergeFor('chevronSvg', $chevronSvgClasses) }} :class="{ 'rotate-180': open, 'rotate-0': !open }" viewBox="0 0 12 12">
                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                            </svg>
                        </div>
                    @endif
                </div>
            </a>
            @if (isset($groupArray['items']))
                <div {{ $attributes->twMergeFor('submenuDiv', $submenuDivClasses) }}
                     x-show="open"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95">
                    <ul class="pl-9 mt-1">
                        @foreach ($groupArray['items'] as $innerName => $innerUrl)
                            @php
                                $currentUrl = url()->current();
                                $isActive = strtok($innerUrl, '?') === $currentUrl;

                                $secondLiAppend = '';
                                if ($isActive)
                                {
                                    $secondLiAppend = ' ring-2 ring-offset-1 ring-slate-500';
                                }
                            @endphp

                            <li class="mb-1 last:mb-0">
                                <a class="block transition duration-150 truncate {{ $secondLiAppend }}" href="{{ $innerUrl }}">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $innerName }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </li>
    @endforeach
</ul>
