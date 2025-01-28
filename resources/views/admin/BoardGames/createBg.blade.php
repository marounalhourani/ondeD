<x-layout
    :links="[ 
        ['url' => '/admin/boardgamemanager', 'label' => 'Show all boardgames with categories'],
        ['url' => '/admin/boardgamemanager/categories', 'label' => 'Show categories'],
        ['url' => '/admin/boardgamemanager/createCat', 'label' => 'create new category'],
        ['url' => '/admin/boardgamemanager/createBoardGame', 'label' => 'Create new Board Game']
    ]"
>
    <x-slot name="header">
        Create New Board Game
    </x-slot>

    <h1 class="text-2xl font-bold mb-4">Add a New Board Game</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="/admin/boardgamemanager/boardgames" method="POST">
        @csrf
        
        <!-- Board Game Name -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">Board Game Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="border border-gray-300 rounded w-full py-2 px-3"
                placeholder="Enter board game name" 
                required
            >
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="description">Description</label>
            <textarea 
                id="description" 
                name="description" 
                class="border border-gray-300 rounded w-full py-2 px-3"
                placeholder="Enter a short description" 
                required
            ></textarea>
        </div>


        <!-- Category Dropdown -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="category_id">Select Category</label>
            <select 
                id="category_id" 
                name="category_id" 
                class="border border-gray-300 rounded w-full py-2 px-3"
                required
            >
                <option value="" disabled selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
            Add Board Game
        </button>
        
        <a href="/admin/boardgamemanager" class="ml-4 text-gray-600">Cancel</a>
    </form>

</x-layout>
