@php
$classes = cn('flex h-full w-full items-center justify-center rounded-full bg-muted');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
