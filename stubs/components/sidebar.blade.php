@props(['side' => 'left', 'collapsible' => 'offcanvas'])

@php
$borderClass = $side === 'right' ? 'border-l border-border' : 'border-r border-border';
$classes = cn(
    'relative hidden md:flex flex-col overflow-hidden',
    'bg-card text-card-foreground',
    'transition-[width] duration-200 ease-linear',
    $borderClass,
);
@endphp

<aside
    :class="sidebarOpen ? 'w-64' : ('{{ $collapsible }}' === 'icon' ? 'w-12' : 'w-0')"
    {{ $attributes->merge(['class' => $classes]) }}
>
    <div class="flex h-full w-64 flex-col overflow-y-auto">
        {{ $slot }}
    </div>
</aside>

{{-- Mobile backdrop --}}
<div
    x-show="sidebarMobile"
    @click="sidebarMobile = false"
    x-transition.opacity
    class="fixed inset-0 z-40 bg-black/80 md:hidden"
    aria-hidden="true"
></div>

{{-- Mobile drawer --}}
<aside
    x-show="sidebarMobile"
    x-transition:enter="transition ease-out duration-300 transform"
    x-transition:enter-start="{{ $side === 'right' ? 'translate-x-full' : '-translate-x-full' }}"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-200 transform"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="{{ $side === 'right' ? 'translate-x-full' : '-translate-x-full' }}"
    @keydown.escape.window="sidebarMobile = false"
    class="fixed inset-y-0 {{ $side === 'right' ? 'right-0' : 'left-0' }} z-50 flex h-full w-64 flex-col overflow-y-auto bg-card text-card-foreground md:hidden"
    aria-modal="true"
>
    {{ $slot }}
</aside>
