@props([
    'disabled' => false,
])

@php
$classes = cn(
    'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70',
    $disabled ? 'cursor-not-allowed opacity-70' : ''
);
@endphp

<label {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</label>
