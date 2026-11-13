@props(['to', 'match' => null])
@php
    $active = $match ? request()->routeIs($match) : request()->routeIs($to);
@endphp
<a href="{{ route($to) }}" class="px-3 py-2 rounded-md text-sm font-medium {{ $active ? 'bg-indigo-100 text-indigo-700' : 'text-gray-700 hover:bg-gray-100' }}">
    {{ $slot }}
</a>
