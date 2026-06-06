@php
$classes = cn('p-4 align-middle [&:has([role=checkbox])]:pr-0');
@endphp

<td {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</td>
