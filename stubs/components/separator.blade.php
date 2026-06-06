@props([
    'orientation' => 'horizontal',
])

@php
$classes = cn(
    'shrink-0 bg-border',
    $orientation === 'vertical' ? 'w-px h-full' : 'h-px w-full'
);
@endphp

<div
    role="separator"
    aria-orientation="{{ $orientation }}"
    {{ $attributes->merge(['class' => $classes]) }}
></div>
