<x-layout>
    <x-slot:title>Modifier l'article - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Modifier l'article</h1>

    <form method="POST" action="{{ route('posts.update', $post) }}" class="space-y-4 max-w-2xl">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium">Titre</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium">Extrait</label>
            <input type="text" name="excerpt" value="{{ old('excerpt', $post->excerpt) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium">Corps</label>
            <textarea name="body" class="w-full border rounded px-3 py-2">{{ old('body', $post->body) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Catégorie</label>
            <select name="category_id" class="w-full border rounded px-3 py-2">
                <option value="">--</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium">Tags</label>
            @foreach ($tags as $tag)
                <label class="block"><input type="checkbox" name="tags[]" value="{{ $tag->id }}" @checked(in_array($tag->id, old('tags', $post->tags->pluck('id')->all())))> {{ $tag->name }}</label>
            @endforeach
        </div>

        <div>
            <label><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $post->is_published))> Publié</label>
        </div>

        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Mettre à jour</button>
    </form>
</x-layout>
