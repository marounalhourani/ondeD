<x-layout
    :links="[ 
        ['url' => '/admin/boardgamemanager', 'label' => 'Show all boardgames with categories'],
        ['url' => '/admin/boardgamemanager/categories', 'label' => 'Show categories'],
        ['url' => '/admin/boardgamemanager/createCat', 'label' => 'create new category'],
        ['url' => '/admin/boardgamemanager/createBoardGame', 'label' => 'Create new Board Game']
    ]"
>
    <x-slot name="header">
        Edit Category
    </x-slot>

    <h1 class="text-2xl font-bold mb-4">Edit Category</h1>

    <form action="/admin/boardgamemanager/categories/{{ $category->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">Category Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ $category->name ?? '' }}" 
                class="border border-gray-300 rounded w-full py-2 px-3"
                required
            >
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Update Category
        </button>
        
        <a href="/admin/boardgamemanager/categories" class="ml-4 text-gray-600">Cancel</a>
    </form>

</x-layout>
