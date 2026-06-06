<div
    x-data="{ open: false }"
    @click.outside="open = false"
    {{ $attributes->merge(['class' => 'relative inline-block']) }}
>
    {{ $slot }}
</div>
