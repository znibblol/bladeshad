@php
$classes = cn('text-sm text-muted-foreground');
@endphp

<p {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</p>
