<x-layout
  :links="[
    ['url' => '/admin/menu', 'label' => 'ALL MENU ITEMS'],
    ['url' => '/admin/menu/create-cat', 'label' => 'CREATE NEW CATEGORIES'],
    ['url' => '/admin/menu/allcategories', 'label' => 'SHOW ALL CATEGORIES'],
    ['url' => '/admin/menu/create-item', 'label' => 'Create new Item']


  ]"
>
<x-slot name="header">
    Create New Item
  </x-slot>

  <div class="max-w-3xl mx-auto bg-white p-6 shadow-md rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Add New Menu Item</h2>

    <form action="/admin/menu/store-item" method="POST">
      @csrf
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Item Name</label>
        <input type="text" name="name" id="name" 
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
      </div>

      <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="3" 
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm"></textarea>
      </div>

      <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
        <input type="number" name="price" id="price" step="0.01"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
      </div>

      <div class="mb-4">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Subcategory</label>
        <select name="category_id" id="category_id" required 
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
          <option value="">-- Select Subcategory --</option>
          @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-4">
        <label class="inline-flex items-center">
          <input type="checkbox" name="is_special" value="1" class="rounded border-gray-300">
          <span class="ml-2 text-gray-700">Is Special?</span>
        </label>
      </div>

      <button type="submit" 
        class="px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-md hover:bg-blue-700">
        Add Item
      </button>
    </form>

    <a href="{{ url('/admin/menu') }}" class="inline-block mt-4 text-blue-500 hover:underline">
      Back to Menu
    </a>
  </div>
</x-layout>
