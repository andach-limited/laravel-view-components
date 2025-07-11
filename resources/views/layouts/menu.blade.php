<div id="sidebar"
     x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
     {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}
     role="dialog"
     tabindex="-1"
     aria-label="Sidebar"
>
    <div {{ $attributes->twMergeFor('inner-div', $twMergeStrings['inner-div']) }}>
        <div {{ $attributes->twMergeFor('logo-div', $twMergeStrings['logo-div']) }}>
            <!-- Logo -->
            <a {{ $attributes->twMergeFor('logo-a', $twMergeStrings['logo-a']) }} href="#" aria-label="Logo">
                {!! $logo !!}
            </a>
            <!-- End Logo -->
        </div>

        <!-- Content -->
        <div {{ $attributes->twMergeFor('content-div', $twMergeStrings['content-div']) }}>
            <nav {{ $attributes->twMergeFor('content-nav', $twMergeStrings['content-nav']) }}>
                <!-- Sidebar -->
                <div {{ $attributes->twMergeFor('sidebar-div', $twMergeStrings['sidebar-div']) }}>
                    <!-- Sidebar backdrop (mobile only) -->
                    <div {{ $attributes->twMergeFor('sidebar-backdrop', $twMergeStrings['sidebar-backdrop']) }} aria-hidden="true" x-cloak></div>

                    <!-- Sidebar -->
                    <div
                        id="sidebar"
                        {{ $attributes->twMergeFor('sidebar', $twMergeStrings['sidebar']) }}
                        :class="open ? 'translate-x-0' : '-translate-x-64'"
                        @click.outside="open = false"
                        @keydown.escape.window="open = false"
                        x-cloak="lg"
                    >

                        <!-- Sidebar header -->
                        <div {{ $attributes->twMergeFor('sidebar-header', $twMergeStrings['sidebar-header']) }}>
                            <!-- Close button -->
                            <button {{ $attributes->twMergeFor('close-button', $twMergeStrings['close-button']) }} @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                                <span class="sr-only">Close sidebar</span>
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Links -->
                        {{ $slot }}

                    </div>
                </div>
            </nav>
        </div>
        <!-- End Content -->
    </div>
</div>
<!-- End Sidebar -->
