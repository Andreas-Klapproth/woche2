@props(['route', 'activePattern' => null])

@php
    $pattern = $activePattern ?? $route;
    $classes = request()->routeIs($pattern) ? 'active' : '';
@endphp

<a href="{{ route($route) }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
