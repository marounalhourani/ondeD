<x-layout
  :links="[ 
    ['url' => '/admin/menu', 'label' => 'ALL MENU ITEMS'], 
    ['url' => '/admin/menu/create-cat', 'label' => 'CREATE NEW CATEGORIES'], 
    ['url' => '/admin/menu/allcategories', 'label' => 'SHOW ALL CATEGORIES'],
    ['url' => '/admin/menu/create-item', 'label' => 'Create new Item']

  ]"
>
  <x-slot name="header">
    Category Details
  </x-slot>

  <div class="max-w-3xl mx-auto bg-white p-6 shadow-md rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Edit Category</h2>
    
    <!-- Update Category Form -->
    <form action="/admin/menu/update-category/{{ $category->id }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
      </div>
      <button type="submit" class="px-4 py-2 bg-green-600 text-white font-medium text-sm rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
        Update Category
      </button>
    </form>

    <div class="flex justify-between mt-4">
      <!-- Delete Category Form -->
      <form action="/admin/menu/delete-category/{{ $category->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category? This will delete all associated items.');">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-600 text-white font-medium text-sm rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
          Delete Category
        </button>
      </form>
    </div>

    <h3 class="text-lg font-semibold mt-6">Category Details</h3>
    <div class="mt-2 p-4 bg-gray-100 rounded-lg">
      <p><strong>Category Name:</strong> {{ $category->name }}</p>
      <p><strong>Parent Category:</strong> {{ $category->parent ? $category->parent->name : 'None' }}</p>
      <p><strong>Number of Subcategories:</strong> {{ $category->subcategories->count() }}</p>
      <p><strong>Number of Items:</strong> {{ $category->items->count() }}</p>
      <a href="{{ url('/admin/menu/allcategories') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium text-sm rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
        Back to Categories
      </a>
    </div>
  </div>
</x-layout>
