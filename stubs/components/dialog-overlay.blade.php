@php
$classes = cn('fixed inset-0 z-50 bg-black/80');
@endphp

<div
    x-show="open"
    @click="open = false"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    aria-hidden="true"
    {{ $attributes->merge(['class' => $classes]) }}
></div>
