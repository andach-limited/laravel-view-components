@if ($breadcrumbs ?? null)
    <div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
        <!-- Breadcrumb -->
        <div {{ $attributes->twMergeFor('inner-div', $twMergeStrings['inner-div']) }}>
            <div {{ $attributes->twMergeFor('sub-div', $twMergeStrings['sub-div']) }}>
                <!-- Navigation Toggle -->
                <button type="button"
                        @click="sidebarOpen = !sidebarOpen"
                        {{ $attributes->twMergeFor('button', $twMergeStrings['button']) }}
                        aria-controls="sidebar"
                        aria-label="Toggle navigation"
                >
                    <span class="sr-only">Toggle Navigation</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M15 3v18"/><path d="m8 9 3 3-3 3"/></svg>
                </button>
                <!-- End Navigation Toggle -->

                <!-- Breadcrumb -->
                <ol {{ $attributes->twMergeFor('list', $twMergeStrings['list']) }}>
                    @foreach ($breadcrumbs as $loopIndex => $breadcrumb)
                        <li {{ $attributes->twMergeFor($loop->last ? 'item-last' : 'item', $twMergeStrings[$loop->last ? 'item-last' : 'item']) }}>
                            <span {{ $attributes->twMergeFor('span', $twMergeStrings['span']) }}>{{ $breadcrumb }}</span>
                            @unless ($loop->last)
                                {!! $separator !!}
                            @endunless
                        </li>
                    @endforeach
                </ol>
                <!-- End Breadcrumb -->
            </div>
        </div>
        <!-- End Breadcrumb -->
    </div>
@endif
