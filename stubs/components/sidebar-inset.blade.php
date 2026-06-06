@php
$classes = cn('relative flex min-h-svh flex-1 flex-col bg-background');
@endphp

<main {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</main>
