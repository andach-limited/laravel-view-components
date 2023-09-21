<a href="{{ $route }}">
    <button
        class="flex items-center justify-center bg-gray-100 border border-gray-300 w-full rounded-lg shadow-md px-6 py-2 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
        <i class="{{ $fontAwesome }} mr-2"></i>
        <span>{{ $slot }}</span>
    </button>
</a>
