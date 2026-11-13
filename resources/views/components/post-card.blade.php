@props(['post'])
<article class="md-card p-4">
    <h3 class="font-bold text-gray-900"><a href="{{ route('posts.show', $post) }}" class="hover:underline">{{ $post->title }}</a></h3>
    <p class="text-sm text-gray-500">{{ $post->user?->name }} - {{ $post->category?->name }}</p>
    @if ($post->tags->isNotEmpty())
        <p class="text-xs text-gray-500">{{ $post->tags->pluck('name')->join(', ') }}</p>
    @endif
</article>
