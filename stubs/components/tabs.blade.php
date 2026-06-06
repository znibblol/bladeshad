@props([
    'default' => '',
])

@php
$classes = cn('');
@endphp

<div x-data="{ tab: '{{ $default }}' }" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
