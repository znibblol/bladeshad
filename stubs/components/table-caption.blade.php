@php
$classes = cn('mt-4 text-sm text-muted-foreground');
@endphp

<caption {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</caption>
