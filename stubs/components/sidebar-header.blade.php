@php
$classes = cn('flex flex-col gap-2 p-2');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
