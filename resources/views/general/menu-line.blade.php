@php
    $route = request()->route();
    $routeIsCurrentlySelected = false;

    if ($route)
    {
        $routeIsCurrentlySelected = request()->route()->getName() === $menuLineRoute;
    }
@endphp
<li class="mb-1 last:mb-0">
    <a class="block @if ($routeIsCurrentlySelected) text-indigo-500 @else text-slate-400 hover:text-slate-200 @endif transition duration-150 truncate" href="{{ route($menuLineRoute) }}">
        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $menuLineName }}</span>
    </a>
</li>
