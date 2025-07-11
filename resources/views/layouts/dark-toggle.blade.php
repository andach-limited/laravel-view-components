<div
    x-data="{
        darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
        init() {
            this.applyTheme();
        },
        toggle() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
            this.applyTheme();
        },
        applyTheme() {
            document.documentElement.classList.toggle('dark', this.darkMode);
        }
    }"
    x-init="init()"
    {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}
>
    <button @click="toggle()" class="transition-all duration-300 text-xl focus:outline-none">
        <template x-if="!darkMode">
            <i class="fas fa-sun"></i>
        </template>
        <template x-if="darkMode">
            <i class="fas fa-moon"></i>
        </template>
    </button>
</div>
