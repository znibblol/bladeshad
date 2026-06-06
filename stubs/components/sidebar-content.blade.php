@php
$classes = cn('flex min-h-0 flex-1 flex-col gap-2 overflow-auto');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
