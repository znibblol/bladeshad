@props([
    'name'        => null,
    'placeholder' => 'Select...',
    'disabled'    => false,
])

<div
    x-data="{ open: false, selected: null, selectedLabel: @js($placeholder) }"
    x-modelable="selected"
    @click.outside="open = false"
    @keydown.escape="open = false"
    {{ $attributes->merge(['class' => 'relative inline-block w-full']) }}
>
    {{ $slot }}
    @if($name)
        <input type="hidden" name="{{ $name }}" :value="selected ?? ''">
    @endif
</div>
