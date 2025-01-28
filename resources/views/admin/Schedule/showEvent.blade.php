<x-layout
    :links="[
        ['url' => '/admin/schedule', 'label' => 'Events and Dates'],
        ['url' => '/admin/schedule/add-date', 'label' => 'Add Date'],
        ['url' => '/admin/schedule/all-date', 'label' => 'SHOW ALL Dates'],
        ['url' => '/admin/schedule/create-event', 'label' => 'Create new Event']
    ]"
>
  <x-slot name="header">
    Event Details
  </x-slot>

  <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center mb-6">Event: {{ $event->name }}</h1>

        <div class="bg-gray-100 p-6 rounded-lg mb-6">
            <h2 class="text-2xl font-semibold mb-4">Event Information</h2>
            <p><strong>Name:</strong> {{ $event->name }}</p>
            <p><strong>Description:</strong> {{ $event->description }}</p>
            <p><strong>Date ID:</strong> {{ $event->date_id }}</p>
            <p><strong>Date Name:</strong> {{ $event->date->name ?? 'No Date' }}</p>
        </div>

        <div class="flex justify-between space-x-4">
            <!-- Edit Button -->
            <a href="{{ route('events.edit', $event->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition-all duration-200">
                Edit Event
            </a>

            <!-- Delete Form -->
            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="flex items-center">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition-all duration-200">
                    Delete Event
                </button>
            </form>
        </div>
    </div>

</x-layout>
