@props(['type' => 'info', 'title' => null])
<div class="rounded-md border border-gray-200 bg-gray-50 p-4 {{ $attributes->get('class') }}">
    @if ($title)
        <p class="font-medium text-gray-900">{{ $title }}</p>
    @endif
    <div class="text-sm text-gray-700">{{ $slot }}</div>
</div>
