<div
    x-data="{ open: false }"
    x-init="$watch('open', val => document.documentElement.classList.toggle('overflow-hidden', val))"
    {{ $attributes }}
>
    @isset($trigger)
        <div @click="open = true">{{ $trigger }}</div>
    @endisset
    {{ $slot }}
</div>
