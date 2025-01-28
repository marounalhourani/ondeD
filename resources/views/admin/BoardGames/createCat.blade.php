<x-layout
    :links="[ 
        ['url' => '/admin/boardgamemanager', 'label' => 'Show all boardgames with categories'],
        ['url' => '/admin/boardgamemanager/categories', 'label' => 'Show categories'],
        ['url' => '/admin/boardgamemanager/createCat', 'label' => 'create new category'],
        ['url' => '/admin/boardgamemanager/createBoardGame', 'label' => 'Create new Board Game']
    ]"
>
    <x-slot name="header">
        Create New Category
    </x-slot>

    <h1 class="text-2xl font-bold mb-4">Create a New Category</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="/admin/boardgamemanager/categories" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">Category Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="border border-gray-300 rounded w-full py-2 px-3"
                placeholder="Enter category name" 
                required
            >
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
            Create Category
        </button>
        
        <a href="/admin/boardgamemanager/categories" class="ml-4 text-gray-600">Cancel</a>
    </form>

</x-layout>
