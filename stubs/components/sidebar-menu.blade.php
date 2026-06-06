@php
$classes = cn('flex w-full min-w-0 flex-col gap-1');
@endphp

<ul {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</ul>
