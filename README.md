# BladeShad

> shadcn/ui components, ported to Laravel Blade.

BladeShad brings the look and feel of [shadcn/ui](https://ui.shadcn.com) into Laravel Blade views. Instead of a React component library, you get native `.blade.php` files — copied directly into your project so you own and can customise every line.

---

## Attribution

All visual design, component structure, and CSS design tokens come directly from **[shadcn/ui](https://ui.shadcn.com)** by [@shadcn](https://github.com/shadcn). This project is an unofficial port and carries no affiliation with the original project.

The initial port from React/Radix to Laravel Blade was performed by an AI. Ongoing refinements are made by human contributors.

Full credit goes to shadcn and all contributors to the original shadcn/ui project. Please star the [original repository](https://github.com/shadcn-ui/ui) if you find this useful.

---

## Requirements

- PHP 8.1+
- Laravel 10+
- Tailwind CSS v3 or v4
- Alpine.js (for interactive components)

---

## Installation

```bash
composer require znibb/bladeshad
```

Then run the init command to set up everything:

```bash
php artisan bladeshad:init
```

This will:

1. Install [`blade-ui-toolkit/blade-lucide`](https://github.com/blade-ui-toolkit/blade-lucide) for icons
2. Auto-detect your Tailwind version (v3 or v4) and publish `resources/css/bladeshad.css`
3. Publish the `cn()` helper to `app/Helpers/BladeShadHelper.php`
4. Register the helper in your `composer.json` autoload and run `composer dump-autoload`

After init, add the CSS import to your `resources/css/app.css`:

```css
@import './bladeshad.css';
```

---

## Adding components

List all available components:

```bash
php artisan bladeshad:add --list
```

Add one or more components:

```bash
php artisan bladeshad:add button
php artisan bladeshad:add card dialog alert
```

Components are copied to `resources/views/components/ui/`. Dependencies are resolved and included automatically — for example, adding `alert-dialog` will also add `button` and `dialog` if they are not already present.

Overwrite existing files with `--force`:

```bash
php artisan bladeshad:add button --force
```

---

## Available components

| Component | Description |
|---|---|
| `accordion` | Collapsible content sections |
| `alert` | Contextual feedback messages |
| `alert-dialog` | Modal confirmation dialogs |
| `avatar` | User avatar with image and fallback |
| `badge` | Small status labels |
| `breadcrumb` | Navigation trail |
| `button` | Button with multiple variants and sizes |
| `card` | Content container with header and footer |
| `checkbox` | Checkbox input |
| `dialog` | Modal dialog |
| `dropdown-menu` | Dropdown with items, labels, and separators |
| `input` | Text input |
| `label` | Form label |
| `pagination` | Page navigation |
| `popover` | Floating content anchored to a trigger |
| `select` | Select dropdown |
| `separator` | Horizontal or vertical divider |
| `sheet` | Slide-in panel (drawer) |
| `skeleton` | Loading placeholder |
| `switch` | Toggle switch |
| `table` | Data table |
| `tabs` | Tabbed content |
| `textarea` | Multi-line text input |
| `toggle` | Pressable toggle button |
| `tooltip` | Floating label on hover |

---

## Usage

After adding a component, use it in your Blade views with the `ui::` prefix:

```blade
<x-ui::button variant="default" size="default">
    Click me
</x-ui::button>

<x-ui::button variant="outline" size="sm">
    Secondary action
</x-ui::button>
```

```blade
<x-ui::card>
    <x-ui::card-header>
        <x-ui::card-title>Hello</x-ui::card-title>
        <x-ui::card-description>A simple card example.</x-ui::card-description>
    </x-ui::card-header>
    <x-ui::card-content>
        Content goes here.
    </x-ui::card-content>
</x-ui::card>
```

The `cn()` helper merges Tailwind classes and is available globally after init:

```blade
<div class="{{ cn('rounded-md p-4', $active ? 'bg-primary' : 'bg-muted') }}">
    ...
</div>
```

---

## Theming

BladeShad uses the same CSS custom properties as shadcn/ui. Edit `resources/css/bladeshad.css` to change colours, border radius, and other design tokens. Dark mode is supported via the `.dark` class on the `<html>` element.

---

## License

MIT — the same license as [shadcn/ui](https://github.com/shadcn-ui/ui/blob/main/LICENSE.md).
