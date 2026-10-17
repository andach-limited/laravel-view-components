# Known Issues & Improvement Backlog

Audit of the package source as at v2.0.5. Every rendering claim below was verified by rendering
the component through PHPUnit and inspecting the emitted HTML, not inferred from source.

## Reviewed and accepted as-is — do not re-raise

- **`twMergeFor` writing back to the shared bag's `class`.** Deliberate: `twMergeFor` ignores the
  plain `class` attribute so wrappers get config classes only, and the field element's `twMerge`
  consumes the whole bag, which is how `class`/`required`/`data-*` reach the `<input>` rather than
  the outer `<div>`. The knock-on effects (the user's `class` being dropped, the field inheriting
  the label/span classes) are accepted.
- **`<x-andach-submit>` interpolating booleans as strings**, and the resulting loss of the inner
  button's border/hover/size classes. Accepted.

## Critical — wrong HTML shipping today

### 1. Static config cache makes `config()` unreadable after the first component

`src/LaravelViewComponents.php:39-44` caches components/variants in a `static` on first
construction. Stripping `view-components.components` entirely at runtime still renders full
classes. Under Octane/queue workers this serves stale config for the process lifetime, and it
makes config overrides untestable. `self::$mergeCache` (`:35`) is an unbounded static — a slow
leak in long-lived processes.

### 2. Validation error styling inherits the variant colour

`errorBorder`/`errorText` are defined per-variant in `config/view-components-variants.php`, so
`<x-andach-input variant="success">` renders its error in **green**: `border-emerald-500` +
`text-emerald-950`. Errors should stay red regardless of variant.

## Bugs — wrong behaviour, no crash

- **`layouts/menu.blade.php`** references an Alpine `open` that no scope defines (`:29-31`); the
  layout provides `sidebarOpen`. Console error, sidebar transform never applies. `id="sidebar"`
  is also duplicated on lines 1 and 27, and `role="dialog"` is unconditional on a
  permanently-visible desktop element.
- **`alert`'s `:dismissible="false"` still renders the dismiss button** —
  `general/alert.blade.php:16` uses `@isset`, and `isset(false)` is true. Should be `@if`.
- **`sessions.blade.php:6`** renders the `warning` flash with `variant="success"`; line 10 uses
  lowercase `title="error"`.
- **`form` normalises no case.** `Forms/Form.php:37` checks
  `in_array($method, ['PUT','PATCH','DELETE'])`, so `method="put"` emits `<form method="put">`
  with no `@method` — browsers fall back to GET. Add `strtoupper()`.
- **`form` drops all attributes.** `class`, `id`, `x-data` on `<x-andach-form>` vanish;
  `forms/form.blade.php` has no `{{ $attributes }}`.
- **`form-error` throws outside the `web` middleware group.** `forms/form-error.blade.php:1`
  uses `@error`, which needs the globally-shared `$errors`; the trait's own `getErrorBag()`
  correctly falls back but the view doesn't. `Undefined variable $errors` when rendered via
  `Blade::render`, mail views, or any non-web route.
- **`select` renders `placeholder="…"` on `<select>`** — not a valid attribute
  (`forms/select.blade.php:15`).
- **`checkbox`** uses `if ($oldData = old($inputName))` (`Forms/Checkbox.php:48`), so a submitted
  value of `"0"` or `""` is treated as absent and old input is ignored.
- **`progress-bar` off-by-one** — `general/progress-bar.blade.php:6` is
  `$count <= count($items)`, so `li-not-last` also hits the last item. Latent only because that
  config key is currently empty.
- **`breadcrumbs` are invisible on desktop** — the wrapper is `lg:hidden`
  (`components.breadcrumbs.elements.inner-div`), and crumbs are plain strings with no links or
  `aria-label="Breadcrumb"`.
- **`avatar` with neither `img` nor `label` emits `<img src="" alt="">`**, which re-requests the
  current page in some browsers.
- **Dark mode doesn't persist.** `layout.blade.php` reads
  `documentElement.classList.contains('dark')` and writes `localStorage.theme`, but nothing ever
  *applies* the stored value on load. Every page load flashes/reverts to light unless the host
  app adds its own head script — currently undocumented.
- **`resources/dist/laravel-view-components.js` fights Alpine.** It hard-`remove()`s the alert
  node on click while Alpine runs `x-show`/`x-transition` on the same click, killing the 300ms
  transition. It is also injected mid-`<body>` by `@once` in `alert.blade.php:26`.
- **`service-button`'s `url` and `button`'s `href`/`prefix`/`suffix` are accepted but never
  rendered** — silent no-ops.
- **`config/view-components-components.php:26`** — `over:opacity-75` should be
  `hover:opacity-75` (correct at line 295).
- **`config/view-components-components.php:799`** — `origin-[0-0]` is not a valid arbitrary
  value (`origin-[0]` at line 401).
- **`input`'s `:border="false"` can't remove the border** — `border-2` is hard-coded in the
  `input` element's `base` as well as in `attributes`.
- **`checkbox`/`radio` define no `sizes`**, so `size` is silently inert; their label
  `<span class="ml-2">` is hard-coded rather than a config element.
- **`hover:dark:` variant order** appears 7× in the variants config. It compiles, but
  tailwind-merge won't recognise it as conflicting with `dark:hover:`, so overrides won't
  replace it.

## Structural / project issues

- **`extra.laravel.aliases` points at a class that doesn't exist** —
  `Andach\LaravelViewComponents\Facades\LaravelViewComponents`; there is no `src/Facades/`. Any
  use of the facade fails.
- **No `.github/` directory** — all three CI badges above are dead, and there is no CI at all.
  `composer analyse` calls phpstan, which isn't in `require-dev`.
- **`composer format` would rewrite every file in the repo.** The checkout is CRLF while
  `pint.json` expects LF, so `vendor/bin/pint --test` fails on all 84 PHP files with
  `line_ending` (plus `method_argument_space`/`align_multiline_comment` findings that are purely
  CRLF artifacts — the same files pass cleanly once converted to LF). Normalise first, e.g.
  `* text=auto eol=lf` in `.gitattributes`, in a single dedicated commit, otherwise the next
  `pint` run buries every real diff.
- **The Tailwind setup above won't generate most of the package's classes.**
  `@source '…/src/Components/*.php'` misses the nested `Forms/`/`General/`/`Layouts/` dirs, and
  it sources `config/view-components.php` — which contains only view paths — while every actual
  class lives in `view-components-components.php` and `view-components-variants.php`, neither of
  which is sourced.
- **Tests are 27 one-assertion smoke tests.** Nothing covers `@bind`, `old()` repopulation, error
  rendering, variants, sizes, boolean overrides, or the `Layout`/`Sessions`/`Error`/`Sidebar*`
  components. Every bug above passes the current suite.
- **`tests/AndachTestCase.php`** has two defects: `Blade::component($alias, $className)` has the
  arguments reversed (signature is `component($class, $alias)`), and
  `View::addNamespace('laravel-view-components', …)` registers a namespace nothing uses (views
  resolve as `view-components::`).
- **Unregistered/dead surface:** `FormSection`, `FormAttachment` and `FormCheckboxIcon` are never
  registered in the provider and have no views; `form-attachment` has no `views` entry, so
  `view(null)`. Config keys `label`, `attachments-and-comments` and `enable_component_test` are
  dead. Pagination views ship but `Paginator::defaultView()` is commented out
  (`LaravelViewComponentsServiceProvider.php:103-104`) — and those views use hard-coded grays
  with no dark mode.
- **`view()->composer('*')` shares `$menu` with every view in the host app** (`:73-75`), silently
  clobbering any controller-provided `$menu`. Should be namespaced (`andachMenu`) or scoped to
  the package's own views.
- **`BaseComponent::__construct` catches `ErrorException` and rewrites any "Undefined array
  key"** into a generic config message, swallowing unrelated key errors from deeper in the stack.
  `LaravelViewComponents.php:50` should validate `isset($this->components[$component])` and throw
  a named exception including the component name.
- **Hidden order dependence:** `$enabledAttributesFromConfig` is populated as a side effect of
  `classesAttributes()` but read by `calculatedVariantKeys()`; `buildClasses()` only works
  because line 64 happens to precede line 67.
- **Leftovers:** `database/factories/ModelFactory.php` (fully commented out),
  `create_view_components_table.php.stub`, commented-out grid/col/gap blocks
  (`LaravelViewComponents.php:68-85`), a commented class line in `layouts/sidebar.blade.php`,
  and `Input.php:60`/`Textarea.php:60` computing a `$class` property that no view uses and that
  is stale by construction (assigned before the error border is appended). `composer.json` still
  says `"This is my package laravel-view-components"`, the author name is misspelled
  "Christodolou", and the CHANGELOG is out of order and stops at v2.0.4 despite a v2.0.5 tag.

## Suggested order of attack

1. #1 (static config cache) — it silently defeats config overrides and blocks testing the rest.
2. #2 (variant error colours), plus the `form` method casing and the `alert` `@isset`.
3. Then real tests: assert exact class strings for a field with a label, an errored input, and
   each variant — that is the harness that would have caught everything below.

## Fixed

Verified by rendering each component and asserting on the emitted HTML.

- **Element `attributes` config emitted a literal `1` class** — `LaravelViewComponents.php:210`
  put the whole `[bool, string]` option array into the class list. Now takes `$options[1]`.
- **Two stray `"` characters** — `general/menu-group.blade.php:44` and `General/Chat.php:22`.
- **XSS in `layouts/sessions.blade.php:15`** — validation messages now escaped per-message via
  `array_map('e', …)`, keeping the `<br />` separators.
- **`<x-andach-h>` invalid tags and crash** — `number` is clamped to 1-6, and the computed size
  index is clamped to the bounds of `$sizes` so a re-configured H1 size cannot overflow.
  `BaseComponent::getSizeIndex()` also returned `array_search`'s `false`, which coerced to `0`
  against its `?int` return type and silently resolved to the largest size; it now returns `null`.
- **`<x-andach-button>` rendered `type=""`** — defaults to `button`, and the view falls back to
  `button` for an explicit null/empty. **Behaviour change:** a bare `<x-andach-button>` inside a
  form no longer submits it; use `<x-andach-submit>` or `type="submit"`.
- **`code`'s `commandLine` mode** — `command-line` is now a class on the `<pre>` (which is what
  Prism activates on), `data-*` values are quoted and escaped, and unknown keys are still dropped.
  Attribute injection via a value containing `"` is closed.
- **`textarea` emitted its value wrapped in indentation**, which was submitted back and
  accumulated on every round trip. Now `>{{ $value }}</textarea>` with no surrounding whitespace.

## Open questions

- Is `layouts/error.blade.php` emitting a `<body>` tag deliberate? It can only be used as a whole
  page.
- Should `errorBorder`/`errorText` be pulled out of the per-variant arrays into a single global
  error style? That is a breaking change for anyone overriding published variants.
