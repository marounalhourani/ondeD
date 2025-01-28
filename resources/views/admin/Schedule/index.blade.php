<x-layout
    :links="[
        ['url' => '/admin/schedule', 'label' => 'Events and Dates'],
        ['url' => '/admin/schedule/add-date', 'label' => 'Add Date'],
        ['url' => '/admin/schedule/all-date', 'label' => 'SHOW ALL Dates'],
        ['url' => '/admin/schedule/create-event', 'label' => 'Create new Event']
    ]"
>
  <x-slot name="header">
    All Events
  </x-slot>

  <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center mb-6">Events List</h1>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border border-gray-300 p-3">ID</th>
                        <th class="border border-gray-300 p-3">Event Name</th>
                        <th class="border border-gray-300 p-3">Event Description</th>
                        <th class="border border-gray-300 p-3">Date ID</th>
                        <th class="border border-gray-300 p-3">Date Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr class="hover:bg-gray-100 transition duration-300 cursor-pointer"
                            onclick="window.location='{{ route('events.show', $event->id) }}'">
                            <td class="border border-gray-300 p-3 text-center">{{ $event->id }}</td>
                            <td class="border border-gray-300 p-3">{{ $event->name }}</td>
                            <td class="border border-gray-300 p-3">{{ $event->description }}</td>
                            <td class="border border-gray-300 p-3 text-center">{{ $event->date_id }}</td>
                            <td class="border border-gray-300 p-3">{{ $event->date->name ?? 'No Date' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-layout>
