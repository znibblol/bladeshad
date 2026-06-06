@php
$classes = cn('font-normal text-foreground');
@endphp

<span role="link" aria-disabled="true" aria-current="page" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
