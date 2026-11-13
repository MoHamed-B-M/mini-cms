<x-layout>
    <x-slot:title>Article introuvable - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold mb-2">Article introuvable</h1>
    <p class="text-gray-600 mb-4">Cet article n'existe pas ou a été supprimé.</p>
    <a href="{{ route('posts.index') }}" class="text-indigo-600 hover:underline">Voir tous les articles</a>
</x-layout>
