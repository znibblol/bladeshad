@php
$classes = cn('mx-auto flex w-full justify-center');
@endphp

<nav role="navigation" aria-label="pagination" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</nav>
