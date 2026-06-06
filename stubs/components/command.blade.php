@php
$classes = cn('flex h-full w-full flex-col overflow-hidden rounded-md bg-popover text-popover-foreground');
@endphp

<div
    x-data="{
        query: '',
        noResults: false,
    }"
    x-effect="query; $nextTick(() => {
        const opts = $el.querySelectorAll('[role=\'option\']');
        noResults = opts.length > 0 && Array.from(opts).every(el => el.style.display === 'none');
    })"
    {{ $attributes->merge(['class' => $classes]) }}
    role="combobox"
    aria-haspopup="listbox"
>
    {{ $slot }}
</div>
