<x-layout
    :links="[
        ['url' => '/admin/schedule', 'label' => 'Events and Dates'],
        ['url' => '/admin/schedule/all-date', 'label' => 'Show All Dates'],
        ['url' => '/admin/schedule/create-event', 'label' => 'Create new Event']
    ]"
>
  <x-slot name="header">
    Edit Event
  </x-slot>

  <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center mb-6">Edit Event: {{ $event->name }}</h1>

        <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Event Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Event Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $event->name) }}" 
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter event name" 
                    required
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Event Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold">Event Description</label>
                <textarea 
                    id="description" 
                    name="description" 
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter event description" 
                    required
                >{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Event Date -->
            <div class="mb-4">
                <label for="date_id" class="block text-gray-700 font-semibold">Event Date</label>
                <select 
                    id="date_id" 
                    name="date_id" 
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required
                >
                    @foreach($dates as $date)
                        <option value="{{ $date->id }}" {{ $event->date_id == $date->id ? 'selected' : '' }}>
                            {{ $date->name }}
                        </option>
                    @endforeach
                </select>
                @error('date_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition-all duration-200">
                Update Event
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('events.show', $event->id) }}" class="text-blue-500 hover:underline">Back to Event Details</a>
        </div>
    </div>

</x-layout>
