<x-layout
  :links="[ 
    ['url' => '/admin/menu', 'label' => 'ALL MENU ITEMS'], 
    ['url' => '/admin/menu/create-cat', 'label' => 'CREATE NEW CATEGORIES'], 
    ['url' => '/admin/menu/allcategories', 'label' => 'SHOW ALL CATEGORIES'],
    ['url' => '/admin/menu/create-item', 'label' => 'Create new Item']
  ]"
>
  <x-slot name="header">
    Item Details
  </x-slot>

  <div class="max-w-3xl mx-auto bg-white p-6 shadow-md rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Edit Item</h2>
    
    <!-- Update Item Form -->
    <form action="/admin/menu/update-item/{{ $item->id }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Item Name</label>
        <input type="text" name="name" id="name" value="{{ $item->name }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
      </div>

      <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ $item->description }}</textarea>
      </div>

      <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-700">Price ($)</label>
        <input type="number" name="price" id="price" value="{{ $item->price }}" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
      </div>

      <div class="mb-4">
        <label for="subcategory" class="block text-sm font-medium text-gray-700">Subcategory</label>
        <select name="subcategory_id" id="subcategory" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          @foreach($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}" {{ $item->category_id == $subcategory->id ? 'selected' : '' }}>
              {{ $subcategory->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Special Item</label>
        <div class="flex items-center mt-1">
          <input type="checkbox" name="is_special" id="is_special" value="1" {{ $item->is_special ? 'checked' : '' }} class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
          <label for="is_special" class="ml-2 text-sm text-gray-600">Mark as Special</label>
        </div>
      </div>

      <button type="submit" class="px-4 py-2 bg-green-600 text-white font-medium text-sm rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
        Update Item
      </button>
    </form>

    <div class="flex justify-between mt-4">
      <!-- Delete Item Form -->
      <form action="/admin/menu/delete-item/{{ $item->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-600 text-white font-medium text-sm rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
          Delete Item
        </button>
      </form>
    </div>

    <h3 class="text-lg font-semibold mt-6">Item Details</h3>
    <div class="mt-2 p-4 bg-gray-100 rounded-lg">
      <p><strong>Item Name:</strong> {{ $item->name }}</p>
      <p><strong>Description:</strong> {{ $item->description }}</p>
      <p><strong>Price:</strong> ${{ number_format($item->price, 2) }}</p>
      <p><strong>Main Category:</strong> {{ $item->category->parent ? $item->category->parent->name : 'None' }}</p>
      <p><strong>Subcategory:</strong> {{ $item->category->name ?? 'N/A' }}</p>
      <p><strong>Special Item:</strong> {{ $item->is_special ? 'Yes' : 'No' }}</p>
      <a href="{{ url('/admin/menu') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium text-sm rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
        Back to Menu
      </a>
    </div>
  </div>
</x-layout>
