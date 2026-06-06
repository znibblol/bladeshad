@php
$classes = cn('inline-flex items-center gap-1.5');
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</li>
