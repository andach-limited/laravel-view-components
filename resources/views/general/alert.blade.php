<div class="border px-4 py-3 rounded flex items-center gap-2 {{ $variantClasses($variant) }}">
    @if ($iconHtml)
        <div>{!! $iconHtml !!}</div>
    @endif
    <div>{{ $slot }}</div>
</div>
