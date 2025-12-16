<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title ?? 'Website Saya' }}</title>
</head>
<body class="h-full">

    <!-- NAVBAR -->
    <nav class="bg-gray-800 text-white shadow-md">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

            <!-- LOGO -->
            <a href="/" class="flex items-center space-x-3">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">
                    Vandoo
                </span>
            </a>

            <!-- AUTH BUTTONS -->
            <div class="flex items-center md:order-2 space-x-3">
                @auth
                    <span class="hidden md:inline text-sm font-medium">
                        Hi, {{ auth()->user()->name }}
                    </span>

                    <a href="/dashboard/posts"
                       class="text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-sm px-4 py-2">
                        Dashboard
                    </a>

                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-4 py-2">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="/login"
                       class="text-white hover:text-gray-200 font-medium text-sm px-4 py-2">
                        Login
                    </a>

                    <a href="/register"
                       class="text-gray-800 bg-white hover:bg-gray-100 font-medium rounded-lg text-sm px-4 py-2">
                        Register
                    </a>
                @endauth

                <!-- MOBILE MENU BUTTON -->
                <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-200 rounded-lg md:hidden hover:bg-gray-700">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"
                              d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>

            <!-- MENU -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                 id="navbar-user">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border rounded-lg
                           md:space-x-8 md:flex-row md:mt-0 md:border-0">

                    <li>
                        <a href="/"
                           class="{{ request()->is('/') ? 'text-yellow-300 font-bold' : 'text-white hover:text-blue-200' }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="/about"
                           class="{{ request()->is('about') ? 'text-yellow-300 font-bold' : 'text-white hover:text-blue-200' }}">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="/posts"
                           class="{{ request()->is('posts*') ? 'text-yellow-300 font-bold' : 'text-white hover:text-blue-200' }}">
                            Blog
                        </a>
                    </li>

                    <li>
                        <a href="/categories"
                           class="{{ request()->is('categories*') ? 'text-yellow-300 font-bold' : 'text-white hover:text-blue-200' }}">
                            Categories
                        </a>
                    </li>

                    <li>
                        <a href="/contact"
                           class="{{ request()->is('contact') ? 'text-yellow-300 font-bold' : 'text-white hover:text-blue-200' }}">
                            Contact
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-200 mt-10 p-4 text-center text-gray-500">
        &copy; 2025 Universitas Pasundan. Dibuat dengan Laravel 12.
    </footer>

</body>
</html>
