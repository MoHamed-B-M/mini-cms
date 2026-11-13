<x-layout>
    <x-slot:title>Accueil - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Accueil</h1>

    <section class="mb-8">
        <h2 class="text-xl font-bold mb-3">Articles récents</h2>
        @forelse ($latestPosts as $post)
            <x-post-card :post="$post" />
        @empty
            <p>Aucun article</p>
        @endforelse
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-bold mb-3">Catégories</h2>
        <ul>
            @foreach ($categories as $category)
                <li>{{ $category->name }} ({{ $category->posts_count }})</li>
            @endforeach
        </ul>
    </section>

    <section>
        <h2 class="text-xl font-bold mb-3">Tags populaires</h2>
        <ul>
            @foreach ($tags as $tag)
                <li>{{ $tag->name }} ({{ $tag->posts_count }})</li>
            @endforeach
        </ul>
    </section>
</x-layout>
