@php
$classes = cn('flex h-9 w-9 items-center justify-center');
@endphp

<span role="presentation" aria-hidden="true" {{ $attributes->merge(['class' => $classes]) }}>
    <x-lucide-ellipsis class="h-4 w-4" />
    <span class="sr-only">More</span>
</span>
