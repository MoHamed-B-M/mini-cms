<x-layout>
    <x-slot:title>{{ $heading ?? 'Articles' }} - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">{{ $heading ?? 'Articles' }}</h1>

    @if ($posts->isEmpty())
        <p>Aucun article</p>
    @endif

    <div class="space-y-6">
        @foreach ($posts as $post)
            <article class="md-card p-4">
                <h2 class="text-xl font-bold"><a href="{{ route('posts.show', $post) }}" class="hover:underline">{{ $post->title }}</a></h2>
                <p class="text-sm text-gray-500">
                    {{ $post->category?->name ?? 'Sans catégorie' }} -
                    par {{ $post->user?->name ?? 'auteur inconnu' }}
                </p>
                @if ($post->tags->isNotEmpty())
                    <p class="text-xs text-gray-500">{{ $post->tags->pluck('name')->join(', ') }}</p>
                @endif
            </article>
        @endforeach
    </div>

    <div class="mt-6">{{ $posts->links() }}</div>
</x-layout>
