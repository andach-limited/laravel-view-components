<button
    type="button"
    {{ $attributes->twMergeFor('button', $twMergeStrings['button']) }}
    @click="sidebarOpen = true"
    aria-label="Open sidebar"
>
    ☰
</button>

<!-- Mobile compact brand -->
<div {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}>
    {{ $slot }}
</div>
