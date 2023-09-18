<hr class="mt-8 border-t border-t-gray-700 dark:border-t-gray-300"/>
<div class="grid grid-cols-12 gap-4">
    <div class="tile col-span-3 mt-4">
        <h3 class="text-gray-700 dark:text-gray-300 text-xl">{{ $name }}</h3>
        <p class="text-gray-700 dark:text-gray-300 text-xs">{{ $description }}</p>
    </div>
    <div class="tile col-span-9">
        {{ $slot }}
    </div>
</div>
