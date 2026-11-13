<x-layout>
    <x-slot:title>Modifier la catégorie - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Modifier la catégorie</h1>

    <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="space-y-4 max-w-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium">Nom</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full border rounded px-3 py-2">
            @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full border rounded px-3 py-2">
            @error('slug')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Mettre à jour</button>
    </form>
</x-layout>
