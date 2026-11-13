<x-layout>
    <x-slot:title>Page introuvable - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold mb-2">Page introuvable</h1>
    <p class="text-gray-600 mb-4">La page demandée n'existe pas.</p>
    <a href="{{ route('home') }}" class="text-indigo-600 hover:underline">Retour à l'accueil</a>
</x-layout>
