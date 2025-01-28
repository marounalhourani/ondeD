<x-layout
:links="[ 
        ['url' => '/admin/boardgamemanager', 'label' => 'Show all boardgames with categories'],
        ['url' => '/admin/boardgamemanager/categories', 'label' => 'Show categories'],
        ['url' => '/admin/boardgamemanager/createCat', 'label' => 'Create new category'],
        ['url' => '/admin/boardgamemanager/createBoardGame', 'label' => 'Create new Board Game']
    ]"
>
    <x-slot name="header">Edit Board Game</x-slot>

    <h1 class="text-2xl font-bold mb-4">Edit Board Game</h1>

    <form action="/admin/boardgamemanager/boardgames/{{ $boardGame->id }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
            <input type="text" name="name" value="{{ $boardGame->name }}" class="border border-gray-300 rounded w-full py-2 px-3" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="description">Description</label>
            <textarea name="description" class="border border-gray-300 rounded w-full py-2 px-3" required>{{ $boardGame->description }}</textarea>
        </div>

        <!-- Category -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="category_id">Category</label>
            <select name="category_id" class="border border-gray-300 rounded w-full py-2 px-3" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $boardGame->bg_category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</x-layout>
