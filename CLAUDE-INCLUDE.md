# Andach View Components

This project uses the **`andach/laravel-view-components`** package for all Blade UI. Prefer these components over hand-written HTML wherever one exists. This file describes how to use the package correctly; it does not restate the team's general Blade conventions (see the main conventions file).

Repo: https://github.com/andach-limited/laravel-view-components · Docs: https://laravel-view-components.andach.co.uk/getting-started

> The API below was read from the package source. If a component seems to have props not listed here, verify against the installed package in `vendor/andach/laravel-view-components/src/Components/` rather than guessing — that source is authoritative over this file.

## Component tag prefix

All components are used with the **`x-andach-`** prefix. The name after the prefix matches the registered view key. Examples:

```blade
<x-andach-form>            {{-- forms.form --}}
<x-andach-input>           {{-- forms.input --}}
<x-andach-button>          {{-- general.button --}}
<x-andach-card>            {{-- general.card --}}
<x-andach-h>               {{-- general.h (heading) --}}
<x-andach-table>           {{-- general.table --}}
<x-andach-alert>           {{-- general.alert --}}
<x-andach-layout>          {{-- layouts.layout --}}
```

## Dependencies & setup (already assumed installed)

The package requires **Tailwind**, **FontAwesome**, **Alpine.js** and **jQuery**, wired up via `resources/css/app.css` and `resources/js/app.js` as per the package README. Don't re-add these. Icons use FontAwesome classes; Alpine powers interactive components (dismissible alerts, toggles). Installed via `composer require andach/laravel-view-components` + `php artisan view-components:install` + `vendor:publish --tag=view-components-assets`.

## The generic styling arguments (shared by every component)

Almost every component accepts the same set of optional presentation props. Set the booleans as bare attributes; set `variant` and `size` as strings.

- **Booleans:** `accent`, `active`, `animate`, `background`, `border`, `divide`, `focus`, `full`, `gradient`, `hollow`, `hover`, `pageBackground`, `ring`, `rounded`, `shadow`
- **`variant`** — one of: `default`, `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `accent`, `dark`, `light`. Drives colour/branding from the variants config.
- **`size`** — string sizing token.

```blade
<x-andach-button variant="success" rounded shadow>Save</x-andach-button>
<x-andach-card variant="primary" border rounded>…</x-andach-card>
```

Only set what you need — everything here is nullable and falls back to the package defaults. Reach for `variant` for intent (success/danger/etc.) before hand-writing Tailwind. Note some components ship non-null defaults (e.g. `input`/`textarea`/`select`/`submit` default `hollow` true; `submit` defaults `full` true and `variant="success"`).

## Forms

### Form wrapper

`<x-andach-form>` renders the `<form>`, CSRF, and method spoofing automatically.

- `action` (**required**, string)
- `method` (default `"POST"`) — `PUT`/`PATCH`/`DELETE` are spoofed automatically
- `enctype` (e.g. `"multipart/form-data"` for uploads)

> **`enctype` is not actually a prop.** In v2.0.5 the packaged `forms.form` view renders only `method` and `action` and has no `{{ $attributes }}`, so `enctype` (and `class`, and anything else) is silently dropped — which makes every file upload fail validation with "must be a file", because the browser posts the input as a plain string. This repo carries a one-line override at `resources/views/vendor/view-components/forms/form.blade.php` that adds `{{ $attributes }}` to the form tag. **Keep that file when upgrading the package**, and re-check whether it is still needed. `TrainingController\SessionTest::test_the_upload_form_is_multipart_encoded` guards it. Note that a feature test posting a fake `UploadedFile` will pass either way — it bypasses browser encoding — so only a rendered-HTML assertion catches a regression here.

```blade
<x-andach-form :action="route('users.create-post')">
    {{-- fields --}}
    <x-andach-submit>Create user</x-andach-submit>
</x-andach-form>
```

> Route naming note: per team convention the POST target is the `…create-post` named route (see the main conventions file). Point `action` at that.

### Model binding — `@bind` / `@endbind`

Instead of passing `value`/`selected`/`checked` on every field, wrap the fields in `@bind($model)` … `@endbind`. Each field reads its value from the bound model by matching its `name` to the model attribute. Old input (`old()`) always takes precedence, so validation redisplay works automatically. Bindings nest (stack-based), so the innermost `@bind` wins.

```blade
<x-andach-form :action="route('users.edit-post', $user)" method="PUT">
    @bind($user)
        <x-andach-input name="name" label="Full name" />
        <x-andach-input name="email" type="email" label="Email" />
        <x-andach-select name="role_id" label="Role" :options="$args['roles']" />
    @endbind
    <x-andach-submit>Save changes</x-andach-submit>
</x-andach-form>
```

You can also bind a single field explicitly with `:bind="$model"`, and set fallbacks with `:default="…"`. Prefer the `@bind` block for whole forms.

### Field components

All form fields take `name` (**required**) plus the generic styling args. Common props:

- **`input`** — `name`, `type` (default `"text"`), `label`, `placeholder`, `floating` (bool, floating label), `language` (turns `name` into `name[language]` for translatable fields), `:bind`, `:default`.
- **`textarea`** — same as input (no `type`).
- **`select`** — `name`, `label`, `:options` (array), `blank` (bool, adds empty first option), `multiple` (bool), `placeholder`, `floating`, `:bind`, `:default`.
- **`checkbox`** — `name`, `label`, `value` (default `"1"`), `checked` (bool), `:bind`, `:default`. Handles array names (`name="roles[]"`) and old input.
- **`radio`** — `name`, `label`, `value`, `checked` (bool), `:bind`, `:default`.
- **`submit`** — `type` (default `"submit"`), `interiorHollow`; defaults to `full` and `variant="success"`. Button label goes in the slot.
- **`form-error`** — renders validation errors; pair with fields as needed.

```blade
<x-andach-select name="status" label="Status" blank :options="['active' => 'Active', 'archived' => 'Archived']" />
<x-andach-checkbox name="terms" label="I accept the terms" />
```

Use `:options`, `:bind`, `:default` (colon-prefixed) whenever passing PHP variables/arrays; plain attributes only for literals.

## General components

- **`h`** — headings. `number` (int, default 1) selects `<h1>`–`<h6>`. `<x-andach-h :number="2">Users</x-andach-h>`.
- **`button`** — `href` (renders an `<a>` if set, else a button), `type`, `prefix`/`suffix` (icon/text slots), plus generics. Label in the slot.
- **`card`** — container; content in slot; generics for styling.
- **`table`** — styled table wrapper; build rows in the slot.
- **`alert`** — `title`, `icon` (FontAwesome class), `dismissible` (bool, Alpine-powered), plus generics.
- Others available: `avatar`, `chat`, `code`, `faq`, `menu-group`, `no-results`, `progress-bar`, `service-button`.

## Layout components

Page scaffolding lives under the layout set: `layout` (top-level wrapper, defaults `hollow` + `pageBackground`), `main`, `header` (+ `header-left`/`header-right`/`header-mobile`), `sidebar` (+ `sidebar-top`/`sidebar-menu`/`sidebar-footer`), `menu`, `breadcrumbs`, `content`, `footer`, `search`, `sessions`, `dark-toggle`, `error`. The menu/sidebar are driven by the published `config/view-components-menu.php`; edit that config to change navigation rather than hard-coding menus in Blade.

## Customising

Views and config can be published and pointed at local copies via `vendor:publish` (`--tag=view-components-views`, `--tag=view-components-config`, plus the `-variants`/`-components`/`-menu` config tags). Variant colours live in `config/view-components-variants.php`. Prefer adjusting published config over overriding component markup.

## Do / don't for this repo

- **Do** use `x-andach-*` components for forms, buttons, cards, headings, tables, alerts and layout.
- **Do** wrap edit/create forms in `@bind($model) … @endbind` and rely on it (plus `old()`) for value population.
- **Do** express intent with `variant` (`success`, `danger`, …) rather than bespoke Tailwind classes.
- **Don't** hand-write `<form>`, CSRF fields, or method-spoofing — the `form` component does it.
- **Don't** invent props. If you need something not listed here, check `vendor/andach/laravel-view-components/src/Components/`.
