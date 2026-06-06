@php
$classes = cn('text-lg font-semibold leading-none tracking-tight');
@endphp

<h2 {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</h2>
