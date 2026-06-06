@php
$classes = cn('inline-flex h-7 w-7 items-center justify-center rounded-md ring-offset-background transition-colors hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring');
@endphp

<button
    type="button"
    @click="toggleSidebar()"
    aria-label="Toggle sidebar"
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @else
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" aria-hidden="true"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 3v18"/></svg>
    @endif
</button>
