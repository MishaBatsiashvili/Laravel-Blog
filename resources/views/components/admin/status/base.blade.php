@php
    switch($preset){
        case 'success':
            $colorClass = 'bg-green-100 text-green-800';
            break;
        case 'secondary':
            $colorClass = 'bg-gray-100 text-gray-800';
            break;
        case 'primary':
            $colorClass = 'bg-cyan-100 text-cyan-800';
            break;
        default:
            $colorClass = 'bg-cyan-100 text-cyan-800';
    };
@endphp

<span class="px-3 inline-flex text-xs leading-5 font-medium rounded-full {{ $colorClass }}">
    {{ $slot }}
</span>
