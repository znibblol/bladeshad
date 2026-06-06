@php
$classes = cn('[&_tr]:border-b');
@endphp

<thead {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</thead>
