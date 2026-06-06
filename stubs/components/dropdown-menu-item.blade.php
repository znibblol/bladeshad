@php
$classes = cn('relative flex cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground');
@endphp

<div
    @click="open = false"
    role="menuitem"
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</div>
