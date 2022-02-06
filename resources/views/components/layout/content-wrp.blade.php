<div class="py-12">
    <div class="{{ isset($wrpStyles) ? $wrpStyles : 'max-w-7xl mx-auto px-3 sm:px-6 lg:px-8' }}">
        @if(isset($styled) && $styled)
        <div class="p-6 bg-white sm:rounded-lg shadow border">
            {{ $slot }}
        </div>
        @else
        {{ $slot }}
        @endif
    </div>
</div>
