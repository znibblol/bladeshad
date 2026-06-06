@php
$classes = cn('-mx-1 my-1 h-px bg-border');
@endphp

<div role="separator" {{ $attributes->merge(['class' => $classes]) }}></div>
