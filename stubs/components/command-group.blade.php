@props(['heading' => ''])

<div role="group" {{ $attributes }}>
    @if($heading)
        <div class="px-2 py-1.5 text-xs font-medium text-muted-foreground">{{ $heading }}</div>
    @endif
    {{ $slot }}
</div>
