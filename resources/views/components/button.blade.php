@props([
    'variant' => 'default',
    'size' => 'default',
    'as' => 'button',
    'href' => null
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0';

    $variantClasses = [
        'default' => 'bg-blue-600 text-white hover:bg-blue-600/90',
        'destructive' => 'bg-red-600 text-white hover:bg-red-600/90',
        'outline' => 'border border-gray-300 bg-transparent hover:bg-gray-100 hover:text-gray-800',
        'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-200/80',
        'ghost' => 'hover:bg-gray-100 hover:text-gray-800',
        'link' => 'text-blue-600 underline-offset-4 hover:underline',
    ];

    $sizeClasses = [
        'default' => 'h-10 px-4 py-2',
        'sm' => 'h-9 rounded-md px-3',
        'lg' => 'h-11 rounded-md px-8',
        'icon' => 'h-10 w-10',
    ];
    
    $classes = $baseClasses . ' ' . $variantClasses[$variant] . ' ' . $sizeClasses[$size];
@endphp

@if($as === 'a' || $href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif