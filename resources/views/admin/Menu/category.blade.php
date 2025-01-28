<x-layout
  :links="[
    ['url' => '/admin/menu', 'label' => 'ALL MENU ITEMS'],
    ['url' => '/admin/menu/create-cat', 'label' => 'CREATE NEW CATEGORIES'],
    ['url' => '/admin/menu/allcategories', 'label' => 'SHOW ALL CATEGORIES'],
    ['url' => '/admin/menu/create-item', 'label' => 'Create new Item']

  ]"
>
  <x-slot name="header">
    SHOW ALL CATEGORIES - MAIN AND SUB
  </x-slot>

  <div class="overflow-x-auto p-6 bg-gray-100 min-h-screen">
    <table class="min-w-full bg-white border border-gray-300 shadow-lg rounded-lg">
      <thead class="bg-blue-600 text-white">
        <tr>
          <th class="px-6 py-3 border text-left text-lg font-semibold">Category Name</th>
          <th class="px-6 py-3 border text-left text-lg font-semibold">Category Type</th>
          <th class="px-6 py-3 border text-left text-lg font-semibold">Parent Category</th>
          <th class="px-6 py-3 border text-left text-lg font-semibold">Number of Subcategories</th>
          <th class="px-6 py-3 border text-left text-lg font-semibold">Items in Category</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mainCategories as $category)
          <tr class="hover:bg-blue-100 transition duration-300 cursor-pointer" onclick="window.location.href='{{ url('/admin/menu/allcategories/' . $category->id) }}'">
            <td class="px-6 py-4 border">{{ $category->name }}</td>
            <td class="px-6 py-4 border">Main</td>
            <td class="px-6 py-4 border">-</td>
            <td class="px-6 py-4 border">{{ $category->subcategories->count() }}</td>
            <td class="px-6 py-4 border">{{ $category->total_items }}</td>
          </tr>
          @foreach ($category->subcategories as $subcategory)
            <tr class="hover:bg-blue-50 transition duration-300 cursor-pointer" onclick="window.location.href='{{ url('/admin/menu/allcategories/' . $subcategory->id) }}'">
              <td class="px-6 py-4 border pl-12">{{ $subcategory->name }}</td>
              <td class="px-6 py-4 border">Subcategory</td>
              <td class="px-6 py-4 border">{{ $category->name }}</td>
              <td class="px-6 py-4 border"></td>
              <td class="px-6 py-4 border">{{ $subcategory->items->count() }}</td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
</x-layout>
