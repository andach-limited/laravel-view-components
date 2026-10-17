---
name: andach-view-components-development
description: Build Blade UI with the andach/laravel-view-components package (x-andach-* components) — forms with @bind model binding, inputs, selects, buttons, cards, tables, alerts, headings, and the layout/sidebar/menu scaffolding — and set up its Tailwind 4, FontAwesome, Alpine.js and jQuery frontend. Use whenever writing or editing Blade views, forms or layouts in this app, or installing/configuring the package.
---

# Andach View Components

This project uses the **`andach/laravel-view-components`** package for its Blade UI. Prefer these components over hand-written HTML wherever one exists.

Repo: https://github.com/andach-limited/laravel-view-components · Docs: https://laravel-view-components.andach.co.uk/getting-started

> This skill ships with the package and is a summary, not the API. The installed package is authoritative: component props are the constructor signatures in `vendor/andach/laravel-view-components/src/Components/`, and what actually reaches the HTML is in `vendor/andach/laravel-view-components/resources/views/`. **Check both before assuming a prop works** — several components accept props their view ignores (see "Known gaps"). Never invent a prop.

## Tag prefix

All components use the **`x-andach-`** prefix, flat (no dot namespacing), regardless of which subdirectory the view lives in:

```blade
<x-andach-input>    <x-andach-form>    <x-andach-submit>
<x-andach-button>   <x-andach-card>    <x-andach-h>
<x-andach-table>    <x-andach-alert>   <x-andach-layout>
```

Registered components (from `LaravelViewComponentsServiceProvider::configurePackage()`):

`alert`, `avatar`, `breadcrumbs`, `button`, `card`, `chat`, `checkbox`, `code`, `content`, `dark-toggle`, `error`, `faq`, `footer`, `form`, `form-error`, `h`, `header`, `header-left`, `header-mobile`, `header-right`, `input`, `layout`, `main`, `menu`, `menu-group`, `no-results`, `progress-bar`, `radio`, `search`, `select`, `service-button`, `sessions`, `sidebar`, `sidebar-footer`, `sidebar-menu`, `sidebar-top`, `submit`, `table`, `textarea`.

If a component isn't on that list, `x-andach-<name>` will not resolve — do not use it.

## Installation

The Composer package is already installed by the time you are reading this. What remains is the frontend wiring. **Check each step before doing it** — if the project is already set up, skip it rather than duplicating imports or `@source` lines.

Requires **Tailwind 4** (via `@tailwindcss/vite`), **FontAwesome**, **Alpine.js** and **jQuery**.

### 1. npm dependencies

```bash
npm install tailwindcss @tailwindcss/vite @fortawesome/fontawesome-free alpinejs jquery
```

Check `package.json` first and only install what's missing. **If you can't run npm** (no shell access, sandboxed, no Node), don't skip silently: tell the user to run the command above themselves, and point out that the package's components render unstyled and without icons/interactivity until Tailwind, FontAwesome, Alpine and jQuery are installed.

`vite.config.js` must include the Tailwind plugin. Recent Laravel skeletons already have it; if not, add `import tailwindcss from '@tailwindcss/vite';` and `tailwindcss()` to the `plugins` array.

### 2. Publish the JS asset

```bash
php artisan vendor:publish --tag=view-components-assets
```

This copies a small script to `public/vendor/view-components/` that `alert`'s dismiss button loads. It is not a config file and is safe to publish.

**Do not publish the config or view files** (`view-components-config`, `-variants-config`, `-components-config`, `-menu-config`, `-views`) as part of an automated install. The package defaults are merged in automatically; publishing freezes a copy that stops receiving upstream changes. Only publish one if the user asks to customise it. Also skip `php artisan view-components:install` — it only prints a greeting and asks interactively to star the repo on GitHub, so it adds nothing.

### 3. `resources/css/app.css`

Make sure it contains:

```css
@import 'tailwindcss';
@import '@fortawesome/fontawesome-free/css/all.css';

@source '../../vendor/andach/laravel-view-components/src/Components/*.php';
@source '../../vendor/andach/laravel-view-components/resources/views/**/*.blade.php';
@source '../../vendor/andach/laravel-view-components/config/view-components.php';
@source '../../config/view-components.php';

@custom-variant dark (&:where(.dark, .dark *));
```

Keep any existing `@source`/`@theme` lines the project already has; add these alongside them. The `@source` lines are what make Tailwind generate the package's classes. Without them the components render unstyled. The last `@source` points at the published config, so it does nothing until someone publishes that file. Keep it anyway so customisations get picked up later. `@custom-variant dark` makes `dark:` classes follow the `.dark` class that `layout` toggles, rather than the OS preference.

### 4. `resources/js/app.js`

It should be:

```js
import './bootstrap';
import '../css/app.css';
import '/node_modules/@fortawesome/fontawesome-free/css/all.min.css';
import Alpine from 'alpinejs'
import $ from 'jquery';

window.Alpine = Alpine
document.addEventListener('DOMContentLoaded', () => {
    Alpine.start()
})

window.$ = $;
window.jQuery = $;
```

If the existing file has other project code, merge these lines in instead of overwriting it. Don't start Alpine twice: remove any other `Alpine.start()`, and if Livewire 3 is installed, use Livewire's bundled Alpine instead of importing it here.

### 5. Build and load

Make sure the app's layout has `@vite(['resources/css/app.css', 'resources/js/app.js'])`, then run `npm run build` (or `npm run dev`). If you couldn't run npm in step 1, tell the user to run these too.

### Runtime notes

Alpine is load-bearing: `layout` declares the root `x-data` (`darkMode`, `toggleDark()`, `sidebarOpen`, `openMenus`, `toggleMenu()`) that `dark-toggle`, `sidebar`, `menu`, `menu-group` and `breadcrumbs` all reference. **Those components only work inside `<x-andach-layout>`.** `alert` and `code` inject their own `@once` script/style tags.

## Generic styling props

Most components (all of `forms/*` and `general/*`) accept the same optional presentation props:

- **Booleans:** `accent`, `active`, `animate`, `background`, `border`, `divide`, `focus`, `full`, `gradient`, `hollow`, `hover`, `pageBackground`, `ring`, `rounded`, `shadow`
- **`variant`** (string) — `default`, `dark`, `light`, `brand`, `primary`, `secondary`, `success`, `warning`, `danger`. That is the complete list in `config/view-components-variants.php`; an unknown value silently falls back to `default`.
- **`size`** (string) — `xs`, `sm`, `base`, `lg`, `xl`. Default `base`. Not every component defines every size.

```blade
<x-andach-button variant="success" rounded shadow>Save</x-andach-button>
<x-andach-card variant="primary" size="lg" border rounded>…</x-andach-card>
```

Three rules that matter:

1. **Every boolean defaults to `null`, meaning "use the config default" — not `false`.** Each component's `config/view-components-components.php` entry sets its own defaults (e.g. `button` is `border` + `rounded` + `hover` on; `card` is `border` + `divide` + `rounded` on). Only pass a boolean when you're changing it.
2. **To force a boolean off you must use the colon form: `:border="false"`.** Writing `border="false"` passes the *string* `"false"`, which PHP coerces to `true` on the `?bool` param — the opposite of what you meant.
3. Reach for `variant` to express intent (`success`, `danger`, …) before hand-writing Tailwind.

Non-null defaults worth knowing: `input`, `textarea`, `select`, `checkbox`, `radio`, `form-error` and `menu-group` all default `hollow` to `true`; `submit` defaults `full` to `true` and `variant` to `success`.

**Layout components are different.** `layout`, `main`, `header`, `header-left`, `header-right`, `header-mobile`, `sidebar`, `sidebar-top`, `sidebar-menu`, `sidebar-footer`, `menu`, `content`, `footer`, `search`, `sessions`, `dark-toggle`, `breadcrumbs` and `error` take **only `active`** (plus their own unique props). They accept no `variant`, no `size`, no `hollow`. Their appearance comes entirely from config.

### Overriding classes

Components merge `$attributes` through tailwind-merge, so `class="…"` **replaces** conflicting utilities rather than appending:

```blade
<x-andach-card class="mb-0 p-8">…</x-andach-card>   {{-- kills the config's mb-4 --}}
```

Views also expose sub-elements via `$attributes->twMergeFor('<element>', …)` (e.g. `label`, `span`, `input`, `floating` on `input`; `header`/`body`/`footer` on `card`), targetable with a prefixed attribute — `label:class="…"`. Verify against the installed `gehrisandro/tailwind-merge-laravel` if you rely on this. Prefer changing published config over sprinkling `class` overrides.

## Forms

### Form wrapper

`<x-andach-form>` renders `<form>`, `@csrf`, and method spoofing.

- `action` (**required**, string)
- `method` (default `"POST"`) — `PUT`/`PATCH`/`DELETE` post as POST with `@method(…)` added automatically
- `enctype` — e.g. `"multipart/form-data"`, required for file uploads

```blade
<x-andach-form :action="route('users.store')" enctype="multipart/form-data">
    {{-- fields --}}
    <x-andach-submit>Create user</x-andach-submit>
</x-andach-form>
```

> **`forms/form.blade.php` has no `{{ $attributes }}`.** Only `method`, `action` and `enctype` reach the HTML. `class`, `id`, `x-data`, `@submit`, `data-*` and anything else on `<x-andach-form>` is **silently dropped**. If you need an attribute on the `<form>` tag, publish the view (`--tag=view-components-views`) and add `{{ $attributes }}`, or wrap the form in a styled `<div>`.

### Model binding — `@bind` / `@endbind`

Wrap fields in `@bind($model)` … `@endbind` instead of passing `value`/`selected`/`checked` on each one. Each field matches its `name` against the bound model. `old()` always wins, so validation redisplay works for free. Bindings are a stack, so they nest and the innermost wins.

```blade
<x-andach-form :action="route('users.update', $user)" method="PUT">
    @bind($user)
        <x-andach-input name="name" label="Full name" />
        <x-andach-input name="email" type="email" label="Email" />
        <x-andach-select name="role_id" label="Role" :options="$roles" />
        <x-andach-checkbox name="permissions[]" value="admin" label="Admin" />
    @endbind
    <x-andach-submit>Save changes</x-andach-submit>
</x-andach-form>
```

Details that matter:

- `name="foo[bar]"` resolves as the dotted path `foo.bar`; `name="tags[]"` resolves against `tags`.
- For a `belongsToMany`/`morphMany` name, binding pulls the attached keys, so `checkbox`/`select multiple` pre-check correctly.
- Per-field escape hatches: `:bind="$otherModel"` binds one field explicitly; `:bind="false"` opts a field out of the surrounding `@bind`; `:default="…"` supplies a fallback used only when neither old input nor the bound value exists.
- `@bind` is a Blade directive on a container singleton, not a component — **always close it with `@endbind`**, including on early returns, or later fields on the page inherit the binding.

### Field components

All fields take `name` (**required**) plus the generic styling props.

| Component | Props beyond `name` |
| --- | --- |
| `input` | `type` (default `text`), `label`, `placeholder`, `floating`, `language`, `:bind`, `:default` |
| `textarea` | `label`, `placeholder`, `floating`, `language`, `:bind`, `:default` (no `type`) |
| `select` | `label`, `:options` (array, `value => label`), `blank`, `multiple`, `placeholder`, `floating`, `:bind`, `:default` |
| `checkbox` | `label`, `value` (default `"1"`), `checked`, `:bind`, `:default` |
| `radio` | `label`, `value` (default `"1"`), `checked`, `:bind`, `:default` (typed `bool` here — don't pass a string) |
| `submit` | `type` (default `submit`), `interiorHollow`; label in the slot, falls back to `__('Submit')` |
| `form-error` | `name` (required), `bag` (default `default`) |

```blade
<x-andach-select name="status" label="Status" blank :options="['active' => 'Active', 'archived' => 'Archived']" />
<x-andach-checkbox name="terms" label="I accept the terms" />
<x-andach-input name="title" label="Title" floating />
```

Notes:

- Always use the colon form for PHP values — `:options`, `:bind`, `:default`, `:checked`. Bare attributes are literal strings.
- `input`, `textarea`, `select`, `checkbox` and `radio` **render their own `form-error`** when the field has an error. Don't add `<x-andach-form-error>` next to them; use it standalone for errors with no matching field.
- `floating` turns the label into a floating label and overwrites `placeholder` with `" "` — don't pass both.
- `language="en"` rewrites the name to `name[en]` and reads via `getTranslation()`, for spatie/laravel-translatable models. It requires the bound model to implement `getTranslation()`.
- `select`: `blank` prepends a real empty `'' => ''` option; `placeholder` instead renders a `disabled` option selected when nothing is chosen. Pick one. If `:options` is empty the slot is rendered instead, so you can hand-write `<option>`s.
- `submit` wraps `x-andach-button`; its `hollow` controls the outer wrapper while `interiorHollow` controls the button itself.
- **`textarea` quirk:** the view prints `{{ $value }}` on its own indented line, so rendered values gain leading whitespace. `trim()` in the controller/request if that matters.

## General components

- **`h`** — `number` (int, default 1) sets both the tag (`<h1>`–`<h6>`) *and* the text size, stepping down from the configured H1 size. `<x-andach-h :number="2">Users</x-andach-h>`.
- **`button`** — `type`, plus generics. Label in the slot. **Renders a `<button>` only.** See "Known gaps" about `href`.
- **`card`** — content in the default slot, plus optional `header`, `body`, `footer` named slots which get their own padding/size classes:
  ```blade
  <x-andach-card>
      <x-slot:header>Users</x-slot:header>
      <x-slot:body>…</x-slot:body>
  </x-andach-card>
  ```
  The default slot renders *before* the named slots, so use one style or the other.
- **`table`** — renders a `<table>` inside a hard-coded overflow/border wrapper `<div>`. Write `<thead>`/`<tbody>` yourself; `base` config styles `th`/`td` via `[&_th]:`-style selectors, so plain cells are already styled.
- **`alert`** — `title`, `icon`, `dismissible` (Alpine `x-show`). **`icon` is raw HTML, echoed unescaped:** `icon="<i class='fa-solid fa-check'></i>"`. Body in the slot.
- **`avatar`** — `img` + `alt` renders an `<img>`; `label` instead renders a text/initials badge. `label` wins if both are given.
- **`no-results`** — `title`, `icon` (raw HTML), extra content in the slot.
- **`faq`** — `question` + `answer` props (not slots), renders `<details>`/`<summary>`.
- **`progress-bar`** — `:items` array of `['text' => …, 'icon' => …, 'complete' => bool]`, plus `inactiveVariant`.
- **`service-button`** — `icon` (raw HTML), `url`; a `role="button"` div, **not** a link — wire navigation yourself.
- **`code`** — `language`, `lineNumbers` (default true), `windowStyle` (`mac`|`windows`), `commandLine` (bool or array of `data-*` options). Slot is escaped. Loads Prism from a **CDN**, so it won't render offline or under a strict CSP.
- **`chat`** — `name`, `time`, `picture`, `me`. Legacy: uses hard-coded classes, ignores variants/config.
- **`menu-group`** — renders a nested `<ul>` from `:items` (the menu config shape: `label => ['url' => …]` or `label => ['items' => [...], 'icon' => …, 'selected' => …]`). Its `title`, `url`, `icon` and `selected` props are ignored by the view — everything comes from `:items`. Normally driven by config rather than called directly.

## Layout

Page scaffolding: `layout` (Alpine root — outermost) → `main`, `header` (+ `header-left`/`header-right`/`header-mobile`), `sidebar` (+ `sidebar-top`/`sidebar-menu`/`sidebar-footer`), `menu`, `breadcrumbs`, `content`, `footer`, `search`, `sessions`, `dark-toggle`, `error`.

Components with required extras:

- **`menu`** — needs a `logo` named slot (raw HTML).
- **`error`** — `number` (int, required) prop, plus `subtitle` and `logo` named slots (`logo` is used as an `<img src>`).
- **`breadcrumbs`** — `:breadcrumbs` array of strings; renders nothing if absent. Needs a `separator` named slot (raw HTML) whenever there's more than one crumb.
- **`content`**, **`footer`**, **`menu`** — accept a `dismissible` prop, currently unused by their views.

**Navigation comes from config, not Blade.** Edit the published `config/view-components-menu.php` rather than hard-coding menus. Each top-level entry supports `route` (resolved to `url` if the route exists), `url`, `icon` (raw HTML), `items` (a `label => url` map for the submenu), and `selected-if-route-begins` (a route-name prefix that marks the section active). Submenu items are highlighted by comparing their URL to `url()->current()`.

> **Footgun:** the service provider registers `view()->composer('*')` that shares a `$menu` variable with **every** view in the app. A `$menu` variable passed from a controller will be overwritten. Name yours something else.

**`x-andach-sessions`** is the flash-message convention — drop it once in the layout and flash `success`, `warning` or `danger` session keys from controllers; it also renders all `$errors` as one alert.

```php
return redirect()->route('users.index')->with('success', 'User created.');
```

## Customising

Publish tags: `view-components-config`, `view-components-views`, `view-components-assets`, plus `view-components-variants-config`, `view-components-components-config`, `view-components-menu-config`. Published `view-components-variants` / `-components` / `-menu` files are merged **recursively over** the package defaults, so you only need to declare the keys you're changing. `config/view-components.php`'s `views` array maps each component to its view path, so you can repoint a single component at a local Blade file without publishing everything.

If you add Tailwind classes to the config, remember the `@source` lines in `app.css` — classes built at runtime (like `h`'s computed `text-*`) need to appear in a scanned file; the `h` config's `include` key exists for exactly that.

## Known gaps — don't be surprised by these

- **`button`'s `href`, `prefix` and `suffix` props do nothing.** `general/button.blade.php` renders `<button type>` + slot only. For a link, use an `<a>` or wrap the button in one — `<x-andach-button href="…">` renders a non-navigating button.
- **`form-section`, `form-attachment` and `form-checkbox-icon` are not registered.** The classes exist in `src/Components/` but aren't in the service provider, so `x-andach-form-section` etc. will not resolve. `form-attachment` also has no entry in the `views` config.
- **Pagination is not wired up.** `resources/views/pagination/*` ships and `config('view-components.pagination')` exists, but the `Paginator::defaultView()` calls are commented out. Laravel's default pagination views render instead.
- `config('view-components.views')` contains entries with no matching file (`label`, `attachments-and-comments`) — dead config.
- `sessions` renders the `warning` flash with `variant="success"` (upstream bug).
- A missing key in the components/variants config surfaces as `RuntimeException: Configuration error: Missing expected key in the config array` from `BaseComponent`.

## Do / don't

- **Do** use `x-andach-*` for forms, buttons, cards, headings, tables, alerts and layout.
- **Do** wrap create/edit forms in `@bind($model) … @endbind` and let it plus `old()` populate values.
- **Do** express intent with `variant`; use `class="…"` only for layout/spacing tweaks.
- **Do** flash `success`/`warning`/`danger` and let `x-andach-sessions` render it.
- **Don't** hand-write `<form>`, `@csrf`, `@method`, or a per-field error `<p>` — the components do these.
- **Don't** write `prop="false"` to disable a boolean; write `:prop="false"`.
- **Don't** put `class`/`id`/Alpine attributes on `<x-andach-form>` — they're dropped.
- **Don't** use Alpine-dependent layout/menu components outside `<x-andach-layout>`.
- **Don't** invent props. Check `vendor/andach/laravel-view-components/src/Components/` for the signature *and* the matching view in `resources/views/` to confirm it's actually rendered.
