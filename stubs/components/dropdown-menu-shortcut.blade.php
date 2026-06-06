@php
$classes = cn('ml-auto text-xs tracking-widest opacity-60');
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
