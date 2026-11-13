<x-layout>
    <x-slot:title>Catégories - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Catégories</h1>

    <a href="{{ route('admin.categories.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Nouvelle catégorie</a>

    <ul class="mt-4 space-y-2">
        @foreach ($categories as $category)
            <li class="flex items-center gap-2">
                <span>{{ $category->name }}</span>
                <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 text-sm">Modifier</a>
                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 text-sm">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
