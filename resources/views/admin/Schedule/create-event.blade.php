<x-layout
    :links="[
        ['url' => '/admin/schedule', 'label' => 'Events and Dates'],
        ['url' => route('dates.create'), 'label' => 'Add Date'],
        ['url' => route('dates.index'), 'label' => 'Show All Dates'],
        ['url' => route('events.create'), 'label' => 'Create new Event']
    ]"
>
    <x-slot name="header">
        Create Event
    </x-slot>

    <h1 class="text-3xl font-bold mb-6 text-gray-800">Create New Event</h1>

    <form action="{{ route('events.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        
        <!-- Event Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Event Name:</label>
            <input type="text" id="name" name="name"
                   class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        <!-- Event Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
            <textarea id="description" name="description" 
                      class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
        </div>

        <!-- Select Date -->
        <div class="mb-4">
            <label for="date_id" class="block text-gray-700 font-bold mb-2">Select Date:</label>
            <select id="date_id" name="date_id" class="w-full p-2 border border-gray-300 rounded-lg" required>
                <option value="" disabled selected>Select a date</option>
                @foreach($dates as $date)
                    <option value="{{ $date->id }}">{{ $date->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
            Create Event
        </button>
    </form>

</x-layout>
