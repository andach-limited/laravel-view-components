<button
    type="button"
    @click="toggleDark()"
    {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}
    aria-label="Toggle dark mode"
>
    <i
        :class="darkMode ? 'fas fa-sun' : 'fas fa-moon'"
    ></i>
</button>
