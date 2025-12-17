<x-layout>
    <x-slot:title>
        Posts
    </x-slot:title>
    <x-slot:content>
    <h1 class="text-5xl font-bold">Daftar Posts</h1>

    @foreach ($posts as $post)
        <br>
        <article>
            <h2 class="font-bold underline"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
            <p>{{ $post->excerpt }}</p>
        </article>
        <br>
    @endforeach
    </x-slot:content>
</x-layout>