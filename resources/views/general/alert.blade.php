<div role="alert" class="mb-4">
    @if ('red' === $color)
        <div class="px-4 py-2 rounded-sm text-sm border bg-rose-100 dark:bg-rose-400/30 border-rose-200 dark:border-transparent text-rose-600 dark:text-rose-400">
    @elseif ('green' === $color)
        <div class="px-4 py-2 rounded-sm text-sm border bg-emerald-100 dark:bg-emerald-400/30 border-emerald-200 dark:border-transparent text-emerald-600 dark:text-emerald-500">
    @elseif ('yellow' === $color)
        <div class="px-4 py-2 rounded-sm text-sm border bg-yellow-100 dark:bg-yellow-400/30 border-yellow-200 dark:border-transparent text-yellow-600 dark:text-yellow-500">
    @endif
        <div class="flex w-full justify-between items-start">
            <div class="flex">
                @if ('red' === $color)
                    <svg class="w-4 h-4 shrink-0 fill-current opacity-80 mt-[3px] mr-3" viewBox="0 0 16 16">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
                    </svg>
                @elseif ('green' === $color)
                    <svg class="w-4 h-4 shrink-0 fill-current opacity-80 mt-[3px] mr-3" viewBox="0 0 16 16">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z"></path>
                    </svg>
                @endif
                <div>{{ $slot }}</div>
            </div>
        </div>
    </div>
</div>
