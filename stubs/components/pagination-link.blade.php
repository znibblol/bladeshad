@props([
    'href' => '#',
    'isActive' => false,
])

@php
$base = 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 w-10';
$active = $isActive
    ? 'border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground'
    : 'hover:bg-accent hover:text-accent-foreground';
$classes = cn($base, $active);
@endphp

<a href="{{ $href }}" @if($isActive) aria-current="page" @endif {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
