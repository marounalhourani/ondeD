<x-layout
  :links="[
    ['url' => '/admin/menu', 'label' => 'ALL MENU ITEMS'],
    ['url' => '/admin/menu/create-cat', 'label' => 'CREATE NEW CATEGORIES'],
    ['url' => '/admin/menu/allcategories', 'label' => 'SHOW ALL CATEGORIES'],
    ['url' => '/admin/menu/create-item', 'label' => 'Create new Item']


  ]"
>
  <x-slot name="header">
    Create New Categories
  </x-slot>

  <form action="/admin/menu/store-cat" method="POST">
    @csrf
    <div class="space-y-4">
      <!-- Category Name -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
        <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
      </div>

      <!-- Parent Category -->
      <div>
        <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Category</label>
        <select name="parent_id" id="parent_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          <option value="">-- No Parent --</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="flex justify-end">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
          Create Category
        </button>
      </div>
    </div>
  </form>
</x-layout>
