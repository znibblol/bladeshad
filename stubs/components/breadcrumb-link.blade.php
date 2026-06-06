@props(['href' => '#'])

@php
$classes = cn('transition-colors hover:text-foreground');
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
