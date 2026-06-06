@php
$classes = cn('flex h-8 shrink-0 items-center rounded-md px-2 text-xs font-medium text-muted-foreground');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
