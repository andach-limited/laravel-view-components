<div class="container flex flex-wrap justify-between items-center mx-auto bg-white rounded-md dark:bg-slate-700">
    <div class="text-center border-dashed border-2 border-slate-400 dark:border-slate-100 rounded-md w-full p-10">
        <i class='{{ $icon }} fa-4x bx-lg mb-5'></i>
        <p class="text-xl mb-2 font-bold">{{ $title }}</p>
        {{ $slot }}
    </div>
</div>
