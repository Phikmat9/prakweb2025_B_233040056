<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Website Saya</title>
</head>
<body class="h-full">

    <nav class="bg-gray-800 text-white p-4">
        <a href="/" class="px-3 py-2 rounded hover:bg-gray-700">Home</a>
        <a href="/about" class="px-3 py-2 rounded hover:bg-gray-700">About</a>
        <a href="/blog" class="px-3 py-2 rounded hover:bg-gray-700">Blog</a>
        <a href="/contact" class="px-3 py-2 rounded hover:bg-gray-700">Contact</a>
    </nav>

    <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    <footer class="bg-white border-t border-gray-200 mt-10 p-4 text-center text-gray-500">
        &copy; 2025 Universitas Pasundan. Dibuat dengan Laravel 12.
    </footer>

</body>
</html>