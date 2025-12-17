<x-layout>
    <x-slot:title>Categories</x-slot:title>

    <h1 class="text-2xl font-bold mb-4">All Categories</h1>
     <x-slot:content>
        <h1 class="text-5xl font-bold">Daftar Posts</h1>
        
        @foreach ($categories as $category)
        <br>
        <article>
            <h2 class="font-bold underline">{{ $category->name }}</h2>
        </article>
        <br>
        @endforeach
    </x-slot:content>


    {{-- <ul class="list-disc pl-5">
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul> --}}

</x-layout>
