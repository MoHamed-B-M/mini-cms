@props(['title', 'subtitle' => null])
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">{{ $title }}</h1>
    @if ($subtitle)
        <p class="text-gray-600 mt-1">{{ $subtitle }}</p>
    @endif
</div>
