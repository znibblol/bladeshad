@props([
    'href'     => null,
    'isActive' => false,
    'size'     => 'md',
])

@php
$sizes = [
    'sm' => 'text-xs',
    'md' => 'text-sm',
];

$classes = cn(
    'flex h-7 min-w-0 -translate-x-px items-center gap-2 overflow-hidden rounded-md px-2 outline-none ring-ring',
    'text-muted-foreground',
    'hover:bg-accent hover:text-accent-foreground',
    'focus-visible:ring-2',
    'disabled:pointer-events-none disabled:opacity-50',
    '[&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:shrink-0',
    $isActive ? 'bg-accent font-medium text-accent-foreground' : '',
    $sizes[$size] ?? $sizes['md'],
);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="button" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
