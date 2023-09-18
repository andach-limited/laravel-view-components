<li class="border-b border-slate-200 dark:border-slate-700 last:border-0">
    <a class="block py-2 px-4 hover:bg-slate-50 dark:hover:bg-slate-700/20" href="/{{ $notification->link_url }}" @click="open = false" @focus="open = true" @focusout="open = false">
        <span class="block text-sm mb-2">
            <span class="font-medium text-slate-800 dark:text-slate-100">{{ $notification->name }}</span>
            {{ $notification->description }}
        </span>
        <span class="block text-xs font-medium text-slate-400 dark:text-slate-500">{{ $notification->created_at }}</span>
    </a>
</li>
