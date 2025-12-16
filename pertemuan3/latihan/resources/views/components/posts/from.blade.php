@props(['categories'])

{{--  Form Body --}}
<form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="grid gap-4 grid-cols-2">

        {{-- Title --}}
        <div class="col-span-2">
            <label for="title" class="block mb-2.5 text-sm font-medium text-gray-900">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 placeholder-gray-400"
                placeholder="Enter post title" required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category --}}
        <div class="col-span-2">
            <label for="category_id" class="block mb-2.5 text-sm font-medium text-gray-900">Category</label>
            <select name="category_id" id="category_id"
                class="block w-full px-3 py-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Excerpt --}}
        <div class="col-span-2">
            <label for="excerpt" class="block mb-2.5 text-sm font-medium text-gray-900">Excerpt</label>
            <textarea name="excerpt" id="excerpt" rows="3"
                class="block w-full px-3 py-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400"
                placeholder="Write a short excerpt or summary">{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Body --}}
        <div class="col-span-2">
            <label for="body" class="block mb-2.5 text-sm font-medium text-gray-900">Content</label>
            <textarea name="body" id="body" rows="8"
                class="block w-full px-3 py-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400"
                placeholder="Write your post content here">{{ old('body') }}</textarea>
            @error('body')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image Upload (YANG BARU DITAMBAHKAN) --}}
        <div class="col-span-2">
            <label for="image" class="block mb-2.5 text-sm font-medium text-gray-900">
                Upload Image
            </label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        {{-- Form Footer --}}
        <div class="flex items-center space-x-4 border-t border-gray-200 pt-4 md:pt-6 mt-4 md:mt-6">
            <button type="submit"
                class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                Create Post
            </button>
            <a href="{{ route('dashboard.index') }}"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5">
                Cancel
            </a>
        </div>
    </div>
</form>