@php
    $baseClass = "inline-block transition-colors text-sm rounded-lg";
    if(isset($customPadding) && $customPadding){
        $baseClass .= ' ' . $customPadding;
    } else {
        $baseClass .= ' ' . 'py-1.5 px-4';
    }
@endphp

@if(isset($href) && $href)
    <a class="{{ $baseClass . " " . $class }}" href="{{ $href }}" >
        <div class="flex align-center">
            {{ $slot }}
        </div>
    </a>
@else
    <button class="{{ $baseClass . " " . $class }}">
        <div class="flex align-center">
            {{ $slot }}
        </div>
    </button>
@endif
