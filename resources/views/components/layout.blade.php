<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mini-CMS' }}</title>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    <x-navbar />
    <main class="max-w-5xl mx-auto px-4 py-8">
        @if (session('success'))
            <div class="mb-4 rounded-md bg-green-100 px-4 py-2 text-green-800">{{ session('success') }}</div>
        @endif
        {{ $slot }}
    </main>
</body>
</html>
