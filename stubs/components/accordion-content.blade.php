@php
$classes = cn('pb-4 pt-0 text-sm');
@endphp

<div
    x-show="active === value"
    x-collapse
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</div>
