@props(['href' => '#'])

@php
$classes = cn('inline-flex items-center justify-center gap-1 pl-2.5 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2');
@endphp

<a href="{{ $href }}" aria-label="Go to previous page" {{ $attributes->merge(['class' => $classes]) }}>
    <x-lucide-chevron-left class="h-4 w-4" />
    <span>Previous</span>
</a>
