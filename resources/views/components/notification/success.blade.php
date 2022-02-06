@php
    $classes = [
        'w-100 sm:w-1/3',
        'fixed bottom-2 right-2',
        'inline-block',
        'border border-1 border-green-600 rounded-lg py-5 px-6',
        'bg-green-100 text-green-800',
        'shadow-xl text-sm'
    ];
@endphp

<div
    class="{{ implode(' ', $classes) }}"
    x-data="{ show: false }"
    x-show="show"
    x-transition
    x-transition:enter.duration.500ms
    x-transition:leave.duration.500ms
    x-init="setTimeout(() => { show = ! show }, 300)"
>
    <div
        class="inline-block absolute top-2 right-2 cursor-pointer"
        x-on:click="show = ! show"
    >
        <i data-feather="x" class="w-4 h-4"></i>
    </div>
    @if(isset($text) && $text)
    <div class="flex items-center mb-1">
        <i data-feather="check-circle" class="w-4 h-4"></i>
        <h1 class="font-bold ml-2">{{ $title }}</h1>
    </div>
    <p>{{ $text }}</p>
    @else
    <div class="flex items-center">
        <i data-feather="check-circle" class="w-4 h-4"></i>
        <h1 class="font-bold ml-2">{{ $title }}</h1>
    </div>
    @endif
</div>
