<x-layout
:links="[
    ['url' => '/admin/menu', 'label' => 'ALL MENU ITEMS'],
    ['url' => '/admin/menu/create-cat', 'label' => 'CREATE NEW CATEGORIES'],
    ['url' => '/admin/menu/allcategories', 'label' => 'SHOW ALL CATEGORIES'],
    ['url' => '/admin/menu/create-item', 'label' => 'Create new Item']
    ]"
>
  <x-slot name="header">
    Edit the Menu
  </x-slot>

  <h1 class="text-2xl font-bold mb-4">Menu Items</h1>

  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300 shadow-md rounded-lg">
      <thead class="bg-gray-200 text-gray-700">
        <tr>
          <th class="border px-4 py-2">ID</th>
          <th class="border px-4 py-2">Name</th>
          <th class="border px-4 py-2">Description</th>
          <th class="border px-4 py-2">Price ($)</th>
          <th class="border px-4 py-2">Main Category</th>
          <th class="border px-4 py-2">Subcategory</th>
          <th class="border px-4 py-2">Special</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($Items as $item)
          <tr class="hover:bg-gray-100 cursor-pointer" onclick="window.location='/admin/menu/{{ $item->id }}'">
            <td class="border px-4 py-2 text-center">{{ $item->id }}</td>
            <td class="border px-4 py-2">{{ $item->name }}</td>
            <td class="border px-4 py-2">{{ $item->description }}</td>
            <td class="border px-4 py-2 text-center">${{ number_format($item->price, 2) }}</td>
            <td class="border px-4 py-2 text-center">
              {{ $item->category->parent ? $item->category->parent->name : 'N/A' }}
            </td>
            <td class="border px-4 py-2 text-center">
              {{ $item->category->name ?? 'N/A' }}
            </td>
            <td class="border px-4 py-2 text-center">
              @if ($item->is_special)
                <span class="text-green-500 font-semibold">Yes</span>
              @else
                <span class="text-red-500">No</span>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</x-layout>
