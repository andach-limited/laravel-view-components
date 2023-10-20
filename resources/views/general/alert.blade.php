<div role="alert" class="mb-4">
    <div class="px-4 py-2 rounded-sm text-sm border bg-{{ $color }}-100 dark:bg-{{ $color }}-400/30 border-{{ $color }}-200 dark:border-transparent text-{{ $color }}-600 dark:text-{{ $color }}-400">
        <div class="flex w-full justify-between items-start">
            <div class="flex">
                @if ($fontAwesomeIcon)
                    <div class="flex-shrink-0">
                        <i class="{{ $fontAwesomeIcon }}"></i>
                    </div>
                @endif
                <div>{{ $slot }}</div>
            </div>
        </div>
    </div>
</div>
