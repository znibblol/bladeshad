@php
$classes = cn('flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
