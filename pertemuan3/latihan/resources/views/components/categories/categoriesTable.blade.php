{{-- Search filter --}}
<div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center gap-4 bg-gradient-to-red from-blue-50 to-indigo-50">
    <form method="GET" action="{{ route('dashboard.categories.index') }}" class="flex-1 max-w-md">
        <label for="search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-body" aria-hidden="true"xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 OZ"/>
                </svg>
            </div>
            <input type="search" name="search" id="search" value="{{ request('search') }}"class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus: border-brand shadow-xs placeholder:text-body" placeholder="Search categories..." />
            <button type="submit" class="absolute end-1.5 bottom-1.5 text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">Search</button>
        </div>
    </form>
    <a href="{{ route('dashboard.categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-black font-medium rounded-lg shadow-sm transition-colors duration-200 whitespace-nowrap">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M124v16m8-8H4"/>
        </svg>
        Add Category
    </a>
</div>
{{-- Table --}}
<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    No
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $int = 1; ?>
            @forelse ($categories as $category)
            <tr class="bg-neutral-primary border-b border-default">
                <td class="px-6 py-4" align="center">
                    {{ $int }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{ $category->name }}
                </th>
                <td class="px-6 py-4 flex">
                    <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline ms-2">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $int++; ?>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                    No categories found. <a href="{{ route('dashboard.categories.create') }}" class="text-blue-600 hover:underline">Create One</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{-- pagination --}}