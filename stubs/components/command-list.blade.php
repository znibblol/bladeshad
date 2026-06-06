@php
$classes = cn('max-h-[300px] overflow-y-auto overflow-x-hidden');
@endphp

<div
    {{ $attributes->merge(['class' => $classes]) }}
    role="listbox"
>
    {{ $slot }}
</div>
