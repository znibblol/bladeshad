<?php

if (!function_exists('cn')) {
    function cn(mixed ...$classes): string
    {
        return implode(' ', array_filter(array_unique(
            array_merge(...array_map(fn($c) => explode(' ', $c), array_filter($classes)))
        )));
    }
}
