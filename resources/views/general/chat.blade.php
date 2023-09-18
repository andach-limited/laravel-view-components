<div class="flex items-start mb-4 last:mb-0">
    <img class="rounded-full mr-4" src="{{ $picture }}" width="40" height="40" alt="User 01">
    <div>
        <div class="{{ $class }}">
            {{ $slot }}
        </div>
        <div class="flex items-center justify-between">
            <div class="text-xs text-slate-500 font-medium">{{ $name }} @ {{ $time }}</div>
        </div>
    </div>
</div>
