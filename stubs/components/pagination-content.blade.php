@php
$classes = cn('flex flex-row items-center gap-1');
@endphp

<ul {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</ul>
