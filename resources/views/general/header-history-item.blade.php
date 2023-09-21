<li>
    <a class="flex items-center p-2 text-slate-800 dark:text-slate-100 hover:text-gray-100 hover:bg-indigo-500 rounded group" href="/{{ $history->url }}" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
        <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500 group-hover:text-gray-100 group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
            <path d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z" />
        </svg>
        <span><span class="font-medium">{{ $history->name }}</span> - <span class="text-slate-600 dark:text-slate-400 group-hover:text-gray-100">/{{ $history->url }}</span></span>
    </a>
</li>
