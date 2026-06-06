@php
$classes = cn('relative w-full overflow-auto');
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <table class="w-full caption-bottom text-sm">
        {{ $slot }}
    </table>
</div>
