<a href="{{ $url }}">
    <button
        class="flex items-center justify-center {{ $variantClasses($variant) }} w-full rounded-lg shadow-md px-6 py-2 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
        {!! $iconHtml !!}&nbsp;
        <span>{{ $slot }}</span>
    </button>
</a>
