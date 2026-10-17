@verbatim
## Andach View Components

This app builds its Blade UI with `andach/laravel-view-components`. Prefer its `x-andach-*` components over hand-written HTML wherever one exists. For the full component reference and frontend setup, activate the `andach-view-components-development` skill, and always do so before writing forms or layouts with these components.

### Conventions

- Tags are flat with an `x-andach-` prefix: `<x-andach-input>`, `<x-andach-card>`, `<x-andach-layout>`. Never invent a component or prop; verify against `vendor/andach/laravel-view-components/src/Components/` and the matching view in `resources/views/`.
- Use `variant` (`default`, `dark`, `light`, `brand`, `primary`, `secondary`, `success`, `warning`, `danger`) to express intent before writing Tailwind classes.
- Boolean props default to `null` (use the config default). To switch one off, use `:border="false"`; `border="false"` passes a truthy string.
- Wrap create/edit forms in `@bind($model)` … `@endbind` instead of passing values per field. `old()` takes precedence automatically. Fields render their own validation errors.
- `<x-andach-form>` handles `@csrf` and method spoofing but drops `class`, `id` and Alpine attributes.
- Layout, sidebar, menu, breadcrumbs and dark-toggle components rely on Alpine state declared by `<x-andach-layout>` and only work inside it.
- Flash `success`, `warning` or `danger` to the session and render them with `<x-andach-sessions>`.

<code-snippet name="Edit form with model binding" lang="blade">
<x-andach-form :action="route('users.update', $user)" method="PUT">
    @bind($user)
        <x-andach-input name="name" label="Full name" />
        <x-andach-select name="role_id" label="Role" :options="$roles" />
    @endbind
    <x-andach-submit>Save changes</x-andach-submit>
</x-andach-form>
</code-snippet>

### Setup

If `resources/css/app.css` lacks `@source` lines for `vendor/andach/laravel-view-components`, the frontend isn't wired up yet; follow the Installation section of the skill. Do not publish the package's config or view files unless the user asks to customise them.
@endverbatim
