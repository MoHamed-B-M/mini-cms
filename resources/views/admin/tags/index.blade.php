<x-layout>
    <x-slot:title>Tags - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Tags</h1>

    <a href="{{ route('admin.tags.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Nouveau tag</a>

    <ul class="mt-4 space-y-2">
        @foreach ($tags as $tag)
            <li class="flex items-center gap-2">
                <span>{{ $tag->name }}</span>
                <a href="{{ route('admin.tags.edit', $tag) }}" class="text-indigo-600 text-sm">Modifier</a>
                <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 text-sm">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
