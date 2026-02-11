<!-- Full-screen mobile overlay (sits behind the slide-over sidebar) -->
<div
    x-show="sidebarOpen"
    x-transition.opacity
    class="fixed inset-0 z-40 lg:hidden"
    @click="sidebarOpen = false"
    aria-hidden="true"
></div>

<!-- Fixed sidebar (off-canvas on mobile, pinned on desktop); flex-col so footer can sit at the bottom -->
<aside
{{--    class="fixed inset-y-0 left-0 z-50 flex w-72 transform flex-col border-r border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900 lg:translate-x-0"--}}
    {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    aria-label="Sidebar"
>
    {{ $slot }}
</aside>
