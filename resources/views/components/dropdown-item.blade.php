@props(['active' => false])

@php
    $classes = "block text-left px-2 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 focus:text-white hover:text-white";
@endphp

<a {{ $attributes([ 'class' => $classes . ($active ? ' bg-blue-500 text-white' : '') ]) }}>
    {{ $slot }}
</a>