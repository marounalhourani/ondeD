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

        <h2 class="text-2xl font-bold text-center mb-4">Add New Date</h2>


        <h1 class="text-3xl font-bold mb-6 text-gray-800">List of Dates</h1>

<div class="w-full max-w-4xl bg-white p-6 rounded-lg shadow-lg">
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Date Name</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($dates as $date)
    <tr class="hover:bg-gray-100">
        <td class="border border-gray-300 px-4 py-2">{{ $date->id }}</td>
        <td class="border border-gray-300 px-4 py-2">{{ $date->name }}</td>
        <td class="border border-gray-300 px-4 py-2 text-center">
        <a href="{{ route('dates.edit', $date->id) }}" class="text-blue-500 hover:underline">Edit</a>
        <form action="{{ route('dates.destroy', $date->id) }}" method="POST" class="inline-block"
                onsubmit="return confirm('Are you sure you want to delete this date?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:underline bg-transparent border-none cursor-pointer">
                    Delete
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3" class="text-center border border-gray-300 px-4 py-2">No dates found.</td>
    </tr>
@endforelse

        </tbody>
    </table>

    <a href="{{ route('dates.create') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
        Add New Date
    </a>
</div>

</x-layout>
