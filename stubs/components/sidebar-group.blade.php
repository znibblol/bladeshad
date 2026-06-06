@php
$classes = cn('relative flex w-full min-w-0 flex-col p-2');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
