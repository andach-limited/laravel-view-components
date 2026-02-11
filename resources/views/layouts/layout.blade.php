<div
    x-data="{
        darkMode: document.documentElement.classList.contains('dark'),

        toggleDark() {
          this.darkMode = !this.darkMode;
          document.documentElement.classList.toggle('dark', this.darkMode);
          localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
        },

        sidebarOpen: false,
        openMenus: {},

        toggleMenu(key) {
          this.openMenus[key] = !this.openMenus[key];
        },
      }"
    {{ $attributes->twMerge(['class' => $twMergeStrings['base']]) }}
>

    {{ $slot }}
</div>
