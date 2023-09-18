<div class="col-span-full xl:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 {{ $class }}">
    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">{{ $title }}</h2>
    </header>
    <div class="p-3">
        {{ $slot }}
    </div>
</div>
