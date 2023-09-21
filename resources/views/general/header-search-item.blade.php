<li>
    <a class="flex items-center p-2 text-slate-800 dark:text-slate-100 hover:text-gray-100 hover:bg-indigo-500 rounded group" href="{{ route('search.string', $search->search_string) }}" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500 group-hover:text-gray-100 group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
            <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
        </svg>
        <span>{{ $search->search_string }}</span>
    </a>
</li>
