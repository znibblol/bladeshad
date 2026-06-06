@props([
    'value',
])

<div x-data="{ value: '{{ $value }}' }" {{ $attributes->merge(['class' => '']) }}>
    {{ $slot }}
</div>
