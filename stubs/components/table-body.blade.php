@php
$classes = cn('[&_tr:last-child]:border-0');
@endphp

<tbody {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</tbody>
