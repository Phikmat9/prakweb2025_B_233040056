@props(['category'])
{{-- Form Body --}}
<form action="{{ route('dashboard.categories.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid gap-4 grid-cols-2">
        <input type="text" name="id" id="id" value="{{ $category->id }}">
        @error('id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
        {{-- Name --}}
        <div class="col-span-2">
            <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Enter category name">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- Form Footer --}}
        <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6 mt-4 md:mt-6">
            <button type="submit" class="inline-flex items-center text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                Edit Post
            </button>
            <a href="{{ route('dashboard.categories.index') }}" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                Cancel
            </a>
        </div>
    </div>
</form>