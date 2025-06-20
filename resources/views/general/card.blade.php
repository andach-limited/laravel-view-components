<div class="col-span-full xl:col-span-6 bg-{{ $color }}-100 dark:bg-{{ $color }}-800 shadow-lg rounded-sm border border-{{ $color }}-200 dark:border-{{ $color }}-700 {{ $class }}">
    <header class="px-5 py-4 border-b border-{{ $color }}-100 dark:border-{{ $color }}-700">
        <h2 class="font-semibold text-{{ $color }}-800 dark:text-{{ $color }}-100">{{ $title }}</h2>
    </header>
    <div class="p-3 text-{{ $color }}-800 dark:text-{{ $color }}-100"">
        {{ $slot }}
    </div>
</div>
