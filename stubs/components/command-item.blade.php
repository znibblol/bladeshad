@props(['value' => '', 'disabled' => false])

@php
$classes = cn(
    'relative flex cursor-pointer select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none',
    'hover:bg-accent hover:text-accent-foreground',
    'aria-selected:bg-accent aria-selected:text-accent-foreground',
    $disabled ? 'pointer-events-none opacity-50' : ''
);
@endphp

<div
    x-show="query === '' || '{{ addslashes($value) }}'.toLowerCase().includes(query.toLowerCase())"
    role="option"
    @if($disabled) aria-disabled="true" @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</div>
