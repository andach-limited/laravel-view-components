<div class="container flex flex-wrap justify-between items-center mx-auto rounded-md mb-4">
    <div class="text-center border-dashed border-2 {{ $variantClasses($variant) }} rounded-md w-full p-10">
        {!! $iconHtml !!}
        <p class="text-xl mb-2 font-bold">{{ $title }}</p>
        {{ $slot }}
    </div>
</div>
