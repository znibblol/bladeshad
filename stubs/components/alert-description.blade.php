@php
$classes = cn('text-sm [&_p]:leading-relaxed');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
