@php
$classes = cn('[&>svg]:size-3.5');
@endphp

<li role="presentation" aria-hidden="true" {{ $attributes->merge(['class' => $classes]) }}>
    @if ($slot->isEmpty())
        <x-lucide-chevron-right />
    @else
        {{ $slot }}
    @endif
</li>
