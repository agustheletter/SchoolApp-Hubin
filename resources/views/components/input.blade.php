@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-base ring-offset-background placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 md:text-sm']) !!}>