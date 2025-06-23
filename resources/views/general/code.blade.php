@once
    <!-- Load default Prism theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/themes/prism-tomorrow.min.css" integrity="sha512-vswe+cgvic/XBoF1OcM/TeJ2FW0OofqAVdCZiEYkd6dwGXthvkSFWOoGGJgS2CW70VK5dQM5Oh+7ne47s74VTg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/plugins/command-line/prism-command-line.min.css" integrity="sha512-EgIkdlA87NL5dPmI6HztTCpg7XKfZRFQHbpEdDF3hCT45HjjmIJOx8K73r+YZha0vKyOcMpzC7fZ4RajCX25tg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/plugins/line-numbers/prism-line-numbers.min.css" integrity="sha512-cbQXwDFK7lj2Fqfkuxbo5iD1dSbLlJGXGpfTDqbggqjHJeyzx88I3rfwjS38WJag/ihH7lzuGlGHpDBymLirZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/plugins/command-line/prism-command-line.min.js" integrity="sha512-6nsaJ4jytF/0bh+5QJY4SOLuZZmcd/TAXHBkLIX/SH1ENpWezpQDJ4LpK2D1IfpjKVyhJQQaNSSvfsQjuYfTow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/plugins/line-numbers/prism-line-numbers.min.js" integrity="sha512-BttltKXFyWnGZQcRWj6osIg7lbizJchuAMotOkdLxHxwt/Hyo+cl47bZU0QADg+Qt5DJwni3SbYGXeGMB5cBcw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endonce

<div {{ $attributes->twMerge(['class' => $classes]) }}>
    <div {{ $attributes->twMergeFor('header', $headerClasses) }}>
        @if ($windowStyle == 'windows')
            <svg width="58" height="14" viewBox="0 0 58 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 7H11" stroke="#878787" stroke-linecap="round" stroke-linejoin="round"></path><path d="M35 1H25C24.4477 1 24 1.44772 24 2V12C24 12.5523 24.4477 13 25 13H35C35.5523 13 36 12.5523 36 12V2C36 1.44772 35.5523 1 35 1Z" stroke="#878787"></path><path d="M47 2L57 12" stroke="#878787" stroke-linecap="round" stroke-linejoin="round"></path><path d="M47 12L57 2" stroke="#878787" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        @elseif ($windowStyle == 'mac')
            <div class="rounded-full w-3 h-3 bg-red-500 mr-2"></div>
            <div class="rounded-full w-3 h-3 bg-yellow-500 mr-2"></div>
            <div class="rounded-full w-3 h-3 bg-green-500"></div>
        @endif
    </div>
    <div class="font-mono">
        <pre {{ $attributes->twMergeFor('content', $contentClasses) }} {{ $commandLineHtml }}><code>{!! e(trim($slot)) !!}</code></pre>
    </div>
</div>
