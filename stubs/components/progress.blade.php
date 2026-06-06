@props(['value' => 0, 'max' => 100])

@php
$percent = $max > 0 ? min(100, max(0, ($value / $max) * 100)) : 0;
$classes = cn('relative h-4 w-full overflow-hidden rounded-full bg-secondary');
@endphp

<div
    {{ $attributes->merge(['class' => $classes]) }}
    role="progressbar"
    aria-valuenow="{{ $value }}"
    aria-valuemin="0"
    aria-valuemax="{{ $max }}"
>
    <div
        class="h-full w-full flex-1 bg-primary transition-all"
        style="transform: translateX(-{{ 100 - $percent }}%)"
    ></div>
</div>
