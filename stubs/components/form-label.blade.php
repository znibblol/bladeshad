@props(['for' => null, 'error' => false])

@php
$hasError = $error || ($for && isset($errors) && $errors->has($for));
$classes = cn(
    'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70',
    $hasError ? 'text-destructive' : ''
);
@endphp

<label
    @if($for) for="{{ $for }}" @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</label>
