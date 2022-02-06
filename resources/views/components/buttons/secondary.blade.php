<x-buttons.base
    href="{{ $href ?? null }}"
    {{ $attributes->merge(['class' => 'text-gray-800 bg-orange-100 hover:bg-orange-200 border border-orange-300 ' . ($class ?? '')]) }}
>
    {{ $slot }}
</x-buttons.base>
