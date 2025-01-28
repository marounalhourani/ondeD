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

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-lg my-8">
        <div class="space-y-8">
            <h2 class="text-4xl font-extrabold text-center text-gray-800">Add New Date</h2>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-500 text-white rounded-xl shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('dates.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-lg font-medium text-gray-700">Date Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        placeholder="Enter the date name" 
                        required
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="w-full py-3 px-6 bg-blue-600 text-white rounded-xl hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition duration-300">
                        Add Date
                    </button>
                </div>
            </form>

            <div class="text-center">
                <a href="/admin/schedule" class="text-blue-600 text-lg hover:underline">Back to Home</a>
            </div>
        </div>
    </div>
</x-layout>
