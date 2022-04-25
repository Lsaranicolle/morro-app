@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-teal-900 text-white px-3 py-2 rounded-md text-sm font-medium'
            : 'text-white hover:bg-teal-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
