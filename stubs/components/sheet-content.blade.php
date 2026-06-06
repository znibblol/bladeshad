@props([
    'side' => 'right',
])

@php
$base = 'fixed z-50 bg-background p-6 shadow-lg transition ease-in-out';

$sides = [
    'top'    => 'inset-x-0 top-0 border-b',
    'bottom' => 'inset-x-0 bottom-0 border-t',
    'left'   => 'inset-y-0 left-0 h-full w-3/4 border-r sm:max-w-sm',
    'right'  => 'inset-y-0 right-0 h-full w-3/4 border-l sm:max-w-sm',
];

$enterStart = match($side) {
    'left'   => '-translate-x-full',
    'top'    => '-translate-y-full',
    'bottom' => 'translate-y-full',
    default  => 'translate-x-full',
};

$classes = cn($base, $sides[$side] ?? $sides['right']);
@endphp

<div
    x-show="open"
    @keydown.escape.window="open = false"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="{{ $enterStart }}"
    x-transition:enter-end="translate-x-0 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-x-0 translate-y-0"
    x-transition:leave-end="{{ $enterStart }}"
    role="dialog"
    aria-modal="true"
    {{ $attributes->merge(['class' => $classes]) }}
>
    <button
        type="button"
        @click="open = false"
        class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none"
    >
        <x-lucide-x class="h-4 w-4" />
        <span class="sr-only">Stäng</span>
    </button>
    {{ $slot }}
</div>
