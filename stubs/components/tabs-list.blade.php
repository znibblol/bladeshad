@php
$classes = cn('inline-flex h-10 items-center justify-center rounded-md bg-muted p-1 text-muted-foreground');
@endphp

<div role="tablist" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
