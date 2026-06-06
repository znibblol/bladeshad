@props(['disabled' => false])

@php
$inputClass = cn('peer sr-only');
$boxClass   = cn(
    'flex h-4 w-4 shrink-0 items-center justify-center rounded-sm border border-primary',
    'text-primary-foreground',
    'peer-checked:bg-primary peer-checked:border-primary',
    'peer-focus-visible:outline-none peer-focus-visible:ring-2 peer-focus-visible:ring-ring peer-focus-visible:ring-offset-2',
    'peer-disabled:cursor-not-allowed peer-disabled:opacity-50'
);
@endphp

<label class="inline-flex cursor-pointer items-center gap-2">
    <input
        type="checkbox"
        {{ $attributes->merge(['class' => $inputClass]) }}
        @disabled($disabled)
    >
    <div class="{{ $boxClass }}">
        <x-lucide-check class="h-3 w-3" />
    </div>
    @if($slot->isNotEmpty())
        <span class="text-sm font-medium leading-none">{{ $slot }}</span>
    @endif
</label>
