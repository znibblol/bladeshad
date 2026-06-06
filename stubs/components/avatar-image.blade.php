@props([
    'src' => '',
    'alt' => '',
])

@php
$classes = cn('aspect-square h-full w-full object-cover');
@endphp

<img src="{{ $src }}" alt="{{ $alt }}" {{ $attributes->merge(['class' => $classes]) }} />
