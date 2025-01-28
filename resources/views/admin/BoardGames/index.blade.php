<x-layout
    :links="[ 
        ['url' => '/admin/boardgamemanager', 'label' => 'Show all boardgames with categories'],
        ['url' => '/admin/boardgamemanager/categories', 'label' => 'Show categories'],
        ['url' => '/admin/boardgamemanager/createCat', 'label' => 'Create new category'],
        ['url' => '/admin/boardgamemanager/createBoardGame', 'label' => 'Create new Board Game']
    ]"
>
    <x-slot name="header">
        Board Games with Categories
    </x-slot>

    <h1 class="text-2xl font-bold mb-4">Board Games</h1>

    <!-- Display the table of board games -->
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Category ID</th>
                <th class="border border-gray-300 px-4 py-2">Category Name</th>
                <th class="border border-gray-300 px-4 py-2">Description</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th> <!-- Added Actions column -->
            </tr>
        </thead>
        <tbody>
            @foreach($boardGames as $boardGame)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $boardGame->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $boardGame->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $boardGame->bg_category_id }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if($boardGame->category)
                            {{ $boardGame->category->name }} <!-- Display category name -->
                        @else
                            No category found
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $boardGame->description }}</td>

                    <td class="border border-gray-300 px-4 py-2">
                        <!-- Edit button -->
                        <a href="/admin/boardgamemanager/boardgames/{{ $boardGame->id }}/edit" class="text-blue-600">Edit</a>

                        <!-- Delete button -->
                        <form action="/admin/boardgamemanager/boardgames/{{ $boardGame->id }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600" onclick="return confirm('Are you sure you want to delete this board game?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/admin/boardgamemanager/createBoardGame" class="bg-blue-500 text-white px-4 py-2 rounded">
        + Add New Board Game
    </a>

</x-layout>
