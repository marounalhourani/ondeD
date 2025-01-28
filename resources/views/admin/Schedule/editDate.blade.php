<x-layout
:links="[
    ['url' => '/admin/schedule', 'label' => 'Events and Dates'],
    ['url' => '/admin/schedule/add-date', 'label' => 'Add Date'],
    ['url' => '/admin/schedule/all-date', 'label' => 'Show All Dates'],
    ['url' => '/admin/schedule/create-event', 'label' => 'Create new Event']
    ]"
>
  <x-slot name="header">
    Add Date
  </x-slot>

    <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Date</h1>

    <form action="{{ route('dates.update', $date->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Date Name:</label>
            <input type="text" id="name" name="name" value="{{ $date->name }}"
                   class="w-full p-2 border border-gray-300 rounded-lg">
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
            Update Date
        </button>
    </form>


</x-layout>
