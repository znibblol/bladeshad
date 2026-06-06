@php
$classes = cn('flex flex-col space-y-1.5 text-center sm:text-left');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
