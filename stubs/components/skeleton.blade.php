@php
$classes = cn('animate-pulse rounded-md bg-muted');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}></div>
