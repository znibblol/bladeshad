<div
    x-show="noResults"
    class="py-6 text-center text-sm text-muted-foreground"
    {{ $attributes }}
>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @else
        No results found.
    @endif
</div>
