@php
$classes = cn('divide-y divide-border');
@endphp

<div x-data="{ active: null }" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
