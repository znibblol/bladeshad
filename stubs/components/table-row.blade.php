@php
$classes = cn('border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted');
@endphp

<tr {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</tr>
