@php
$classes = cn('absolute bottom-full left-1/2 z-50 mb-1 -translate-x-1/2 overflow-hidden rounded-md border bg-popover px-3 py-1.5 text-sm text-popover-foreground shadow-md whitespace-nowrap');
@endphp

<div
    x-show="open"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    role="tooltip"
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</div>
