@php
    $class = "rounded text-white bg-red-500 hover:bg-red-600" . " " . ($extraClass ?? '');
@endphp

<x-buttons.base
    href="{{ $href }}"
    class="{{ $class }}"
>
    {{ $slot }}
</x-buttons.base>
