@props([
    'variant' => 'default',
    'size'    => 'default',
    'pressed' => false,
])

@php
$base = 'inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50';

$variants = [
    'default' => 'bg-transparent hover:bg-muted hover:text-muted-foreground',
    'outline' => 'border border-input bg-transparent hover:bg-accent hover:text-accent-foreground',
];

$sizes = [
    'default' => 'h-10 px-3',
    'sm'      => 'h-9 px-2.5',
    'lg'      => 'h-11 px-5',
];

$classes = cn($base, $variants[$variant] ?? $variants['default'], $sizes[$size] ?? $sizes['default']);
@endphp

<button
    type="button"
    x-data="{ pressed: @js($pressed) }"
    x-modelable="pressed"
    :aria-pressed="pressed"
    @click="pressed = !pressed"
    :class="{ 'bg-accent text-accent-foreground': pressed }"
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</button>
