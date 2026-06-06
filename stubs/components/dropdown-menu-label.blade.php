@php
$classes = cn('px-2 py-1.5 text-sm font-semibold');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
