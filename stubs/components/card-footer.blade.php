@php
$classes = cn('flex items-center p-6 pt-0');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
