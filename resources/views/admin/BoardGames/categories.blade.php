<x-layout
    :links="[ 
        ['url' => '/admin/boardgamemanager', 'label' => 'show all boardgames with categories'],
        ['url' => '/admin/boardgamemanager/categories', 'label' => 'show categories'],
        ['url' => '/admin/boardgamemanager/createCat', 'label' => 'create new category'],
        ['url' => '/admin/boardgamemanager/createBoardGame', 'label' => 'Create new Board Game']
    ]"
>
    <x-slot name="header">
        Categories
    </x-slot>

    <h1 class="text-2xl font-bold mb-4">Categories</h1>

    <table class="min-w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Category Name</th>
                <th class="border border-gray-300 px-4 py-2">Number of Games</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $category->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $category->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $category->board_games_count ?? 0 }}</td>

                    <td class="border border-gray-300 px-4 py-2">
                        <a href="/admin/boardgamemanager/categories/{{$category->id}}/edit" class="text-blue-600">Edit</a>
                        <form action="/admin/boardgamemanager/categories/{{$category->id}}/delete" method="POST" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600" onclick="return confirm('Are you sure you want to delete this category?')">
                            Delete
                        </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/admin/boardgamemanager/createCat" class="bg-blue-500 text-white px-8 py-2 rounded">
    + Add New Category
</a>

</x-layout>
