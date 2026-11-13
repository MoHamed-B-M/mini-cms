<x-layout>
    <x-slot:title>Connexion - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Connexion</h1>

    <form method="POST" action="{{ route('login.store') }}" class="space-y-4 max-w-md">
        @csrf

        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2">
            @error('email')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Mot de passe</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label><input type="checkbox" name="remember" value="1"> Se souvenir de moi</label>
        </div>

        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Se connecter</button>
    </form>
</x-layout>
