@props(['name' => null])

@php
$message = $name && isset($errors) ? $errors->first($name) : null;
@endphp

@if($message || $slot->isNotEmpty())
<p {{ $attributes->merge(['class' => cn('text-sm font-medium text-destructive')]) }}>
    {{ $message ?? $slot }}
</p>
@endif
