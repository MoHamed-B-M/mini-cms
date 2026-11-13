<x-layout>
    <x-slot:title>{{ $post->title }} - Mini-CMS</x-slot:title>

    <article class="max-w-2xl">
        <a href="{{ route('posts.index') }}" class="text-sm text-indigo-600 hover:underline">Retour aux articles</a>

        <h1 class="text-3xl font-bold mt-4 mb-2">{{ $post->title }}</h1>

        <p class="text-sm text-gray-500 mb-4">
            @if ($post->published_at)
                Publié le {{ $post->published_at->format('d/m/Y') }}
            @else
                Brouillon
            @endif
            - {{ $post->category?->name ?? 'Sans catégorie' }} - par {{ $post->user?->name ?? 'auteur inconnu' }}
        </p>

        @if ($post->tags->isNotEmpty())
            <ul class="mb-6 flex flex-wrap gap-2" aria-label="Tags de l'article">
                @foreach ($post->tags as $tag)
                    <li class="rounded-full bg-indigo-50 px-2 py-0.5 text-xs font-medium text-indigo-700">{{ $tag->name }}</li>
                @endforeach
            </ul>
        @endif

        @if ($post->excerpt)
            <p class="text-lg text-gray-600 mb-6">{{ $post->excerpt }}</p>
        @endif

        <div class="text-gray-800 leading-relaxed whitespace-pre-line">{{ $post->body }}</div>
    </article>

    @if (isset($related) && $related->isNotEmpty())
        <section class="mt-12" aria-labelledby="related-title">
            <h2 id="related-title" class="text-xl font-bold mb-4">Dans la même catégorie</h2>

            <div class="grid gap-6 md:grid-cols-2">
                @foreach ($related as $relatedPost)
                    <x-post-card :post="$relatedPost" />
                @endforeach
            </div>
        </section>
    @endif
</x-layout>
