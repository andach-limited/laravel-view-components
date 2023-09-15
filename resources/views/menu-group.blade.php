<li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if($currentlySelected) bg-slate-900 @endif" x-data="{ open: @if($currentlySelected) true @else false @endif }">
    @if ($menuParentRoute)
        <a class="block text-slate-200 truncate transition duration-150" href="{{ route($menuParentRoute) }}" >
    @else
        <a class="block text-slate-200 truncate transition duration-150" href="#0" @click.prevent="open = !open; sidebarExpanded = true">
    @endif
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                {!! Blade::render($menuSvg) !!}
                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $menuGroupName }}</span>
            </div>
            @if (count($menuArray) ?? 0)
                <!-- Chevron -->
                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                    </svg>
                </div>
            @endif
        </div>
    </a>
    @if (count($menuArray) ?? 0)
        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
            <ul class="pl-9 mt-1 hidden" :class="open ? '!block' : 'hidden'">
                @foreach ($menuArray as $minorLineRoute => $minorLineName)
                    <x-menu-line :menu-line-route="$minorLineRoute" :menu-line-name="$minorLineName"/>
                @endforeach
            </ul>
        </div>
    @endif
</li>
