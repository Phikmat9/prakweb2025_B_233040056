<x-layout>
    <x-slot:title>Login</x-slot:title>

     <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h2>

        @if(session('loginError'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                {{ session('loginError') }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Address</label>
                <input type="email" name="email" id="email" 
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('email') border-red-500 @enderror" 
                       placeholder="name@company.com" required value="{{ old('email') }}">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password" 
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                       placeholder="••••••••" required>
            </div>

            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
        </form>
        
        <p class="mt-4 text-sm text-center text-gray-600">
            Belum punya akun? <a href="/register" class="text-blue-600 hover:underline">Daftar di sini</a>
        </p>
    </div>

</x-layout>
