@props(['types' => 0, 'element' => 'anchor'])

@php
    $htmlAttrStart = '<a';
    $htmlAttrEnd = '</a>';
@endphp

@if ($element == 'button')
    @php
        $htmlAttrStart = '<button';
        $htmlAttrEnd = '</button>';
    @endphp
@endif


{!! $htmlAttrStart !!}
@if ($types == 0)
    {{ $attributes->merge(['class' => 'text-center rounded-md px-3 py-2 text-sm font-semibold leading-6 text-gray-900']) }}>
@elseif ($types == 1)
    {{ $attributes->merge(['class' => 'text-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600']) }}>
@elseif ($types == 2)
    {{ $attributes->merge(['class' => 'text-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600']) }}>
@endif
{{ $slot }}
{!! $htmlAttrEnd !!}
