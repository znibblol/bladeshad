@props(['value', 'label'])

@php
$classes = cn(
    'relative flex w-full cursor-default select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none',
    'hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground'
);
@endphp

<div
    role="option"
    :aria-selected="selected === @js($value)"
    @click="selected = @js($value); selectedLabel = @js($label); open = false"
    {{ $attributes->merge(['class' => $classes]) }}
>
    <span class="absolute left-2 flex h-3.5 w-3.5 items-center justify-center">
        <x-lucide-check x-show="selected === @js($value)" class="h-4 w-4" />
    </span>
    {{ $slot->isNotEmpty() ? $slot : $label }}
</div>
