<x-dashboard-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Welcome, {{ auth()->name }}</h1>

    @include('components.table')
</x-dashboard-layout>