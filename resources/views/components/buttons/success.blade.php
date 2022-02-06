@php
    $class = "rounded text-white bg-green-500 hover:bg-green-600" . " " . ($extraClass ?? '');
@endphp

<x-buttons.base
    href="{{ $href }}"
    class="{{ $class }}"
>
    {{ $slot }}
</x-buttons.base>
