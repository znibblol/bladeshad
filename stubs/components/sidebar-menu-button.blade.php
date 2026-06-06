@props([
    'href'     => null,
    'isActive' => false,
    'size'     => 'default',
])

@php
$sizes = [
    'default' => 'h-8 text-sm',
    'sm'      => 'h-7 text-xs',
    'lg'      => 'h-12 text-sm',
];

$classes = cn(
    'flex w-full items-center gap-2 overflow-hidden rounded-md p-2 text-left outline-none ring-ring transition-colors',
    'hover:bg-accent hover:text-accent-foreground',
    'focus-visible:ring-2',
    'disabled:pointer-events-none disabled:opacity-50',
    '[&>svg]:h-4 [&>svg]:w-4 [&>svg]:shrink-0',
    $isActive ? 'bg-accent font-medium text-accent-foreground' : 'text-muted-foreground',
    $sizes[$size] ?? $sizes['default'],
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
