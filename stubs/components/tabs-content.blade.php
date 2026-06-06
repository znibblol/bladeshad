@props([
    'value',
])

@php
$classes = cn('mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2');
@endphp

<div
    role="tabpanel"
    x-show="tab === '{{ $value }}'"
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</div>
