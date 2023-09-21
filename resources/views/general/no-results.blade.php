<div role="alert">
    <div class="px-4 py-2 rounded-sm text-sm border bg-red-100 dark:bg-red-400/30 border-red-200 dark:border-red-500 text-red-600 dark:text-red-400">
        <div class="w-full">
            <svg class="w-24 h-24 shrink-0 fill-current opacity-80  mx-auto" viewBox="0 0 16 16">
                <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
            </svg>
        </div>
        <div class="w-full text-center mt-4">
            {{ $slot }}
        </div>
    </div>
</div>
