@props(['link', 'active', 'name'])

@php
    $baseClass = 'block px-6 py-4 leading-6 text-gray-500 font-medium text-sm last:border-none border-b-2 border-gray-200';
    $classes = ($active ?? false)
        ? 'text-orange-600'
        : '';
    $classes = $baseClass . ' ' . $classes;
@endphp

<a
    href="{{ $link }}"
    class="{{ $classes }}"
>
    {{ $name ?? '123'}}
</a>
