@once
    <!-- Load default Prism theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/themes/prism-tomorrow.min.css" integrity="sha512-vswe+cgvic/XBoF1OcM/TeJ2FW0OofqAVdCZiEYkd6dwGXthvkSFWOoGGJgS2CW70VK5dQM5Oh+7ne47s74VTg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Override background and text colors -->
    <style>
        pre[class*="language-"],
        code[class*="language-"] {
            background: transparent !important;
            color: inherit !important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/components/prism-core.min.js" integrity="sha512-Uw06iFFf9hwoN77+kPl/1DZL66tKsvZg6EWm7n6QxInyptVuycfrO52hATXDRozk7KWeXnrSueiglILct8IkkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-SkmBfuA2hqjzEVpmnMt/LINrjop3GKWqsuLSSB3e7iBmYK7JuWw4ldmmxwD9mdm2IRTTi0OxSAfEGvgEi0i2Kw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endonce

<div class="mx-5 w-full bg-gray-800 shadow-2xl rounded-lg overflow-hidden mb-4">
    <div id="header-buttons" class="py-3 px-4 flex">
        <div class="rounded-full w-3 h-3 bg-red-500 mr-2"></div>
        <div class="rounded-full w-3 h-3 bg-yellow-500 mr-2"></div>
        <div class="rounded-full w-3 h-3 bg-green-500"></div>
    </div>
    <div id="code-area" class="py-4 px-4 mt-1 font-mono">
        <pre class="language-{{ $language }} text-sm px-4 pb-4 overflow-x-auto"><code>{!! e(trim($slot)) !!}</code></pre>
    </div>
</div>
