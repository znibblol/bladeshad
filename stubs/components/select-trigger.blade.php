@php
$classes = cn(
    'flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background',
    'focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2',
    'disabled:cursor-not-allowed disabled:opacity-50',
    '[&>span]:line-clamp-1'
);
@endphp

<button
    type="button"
    role="combobox"
    :aria-expanded="open"
    @click="open = !open"
    {{ $attributes->merge(['class' => $classes]) }}
>
    <span :class="!selected && 'text-muted-foreground'" x-text="selectedLabel"></span>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 opacity-50" aria-hidden="true">
        <path d="m6 9 6 6 6-6"/>
    </svg>
</button>
