<x-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>


    <article class="py-8 max-w-screen-md mx-auto border-b border-gray-300">
        {{-- Judul --}}
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>

        {{-- Meta Info --}}
        <div class="text-base text-gray-500 mb-5">
            By
            <a href="#" class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a>
            in
            <a href="/categories/{{ $post->category->slug }}"
                class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a> |
            {{ $post->created_at->diffForHumans() }}
        </div>

        {{-- Gambar --}}
        @if ($post->image)
            <div class="my-4 overflow-hidden rounded-lg shadow-sm" style="">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                    class="w-full h-full object-cover object-center">
            </div>
        @endif

        {{-- Isi Artikel --}}
        <div class="my-4 font-light text-gray-800 text-justify leading-relaxed">
            {!! nl2br(e($post->body)) !!}
        </div>

        {{-- Tombol Kembali --}}
        <a href="/posts" class="font-medium text-blue-500 hover:underline mt-5 inline-block">
            &laquo; Back to posts
        </a>
    </article>
</x-layout>