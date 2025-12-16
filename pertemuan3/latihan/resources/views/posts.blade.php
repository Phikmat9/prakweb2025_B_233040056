
<x-layout>
    <x-slot:title>{{ $title ?? ''}}</x-slot:title>
    <x-slot:header>Blog Posts</x-slot:header>



    <div class="grid gap-8 lg:grid-cols-2">

       @foreach ($posts as $post)
         <h2>{{ $post->title }}</h2>
            <article
                class="p-6 bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <!-- Badge Kategori -->
                    <a href="/categories/{{ $post->category->slug }}">
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-0.5 rounded hover:bg-blue-200 transition-colors">
                            {{ $post->category->name }}
                        </span>
                    </a>
                    <!-- Tanggal -->
                    <span class="text-xs font-medium uppercase text-gray-400">
                        {{ $post->created_at->format('j F Y') }}
                    </span>
                </div>

                <!-- Judul Artikel -->
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                    <a href="/posts/{{ $post->slug }}" class="hover:text-blue-600 transition-colors">
                        {{ $post->title }}
                    </a>
                </h2>

                <p class="mb-5 font-light text-gray-500 line-clamp-3">
                    {{ $post->excerpt }}
                </p>

                <!-- Footer Kartu: Author & Tombol Read More -->
                <div class="flex justify-between items-center mt-auto">

                    <!-- Info Penulis (Avatar Inisial) -->
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-white text-xs font-bold">
                            {{ substr($post->author->name, 0, 1) }}
                        </div>
                        <span class="font-medium text-sm text-gray-900">
                            {{ $post->author->name }}
                        </span>
                    </div>

                    <!-- Link Read More -->
                    <a href="/posts/{{ $post->slug }}"
                        class="inline-flex items-center font-medium text-blue-600 hover:underline">
                        Read more
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>

            </article>
        @endforeach

    </div>


</x-layout>