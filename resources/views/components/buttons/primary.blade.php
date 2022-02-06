<x-buttons.base
    href="{{ $href ?? null }}"
    {{ $attributes->merge(['class' => 'text-white bg-orange-600 hover:bg-orange-700 ' . ($class ?? '')]) }}
>
    {{ $slot }}
</x-buttons.base>
