<x-layout>
  <x-slot name="header">
Image of Event: {{$img_info->event_name}}
  </x-slot>
  <div class="flex flex-col items-center space-y-4 p-6 bg-gray-100 rounded-lg shadow-md max-w-lg mx-auto">
    <!-- Image Section -->
    <div class="relative">
      <img 
        src="{{ asset('carousel-images/' . $img_info->img_path) }}" 
        alt="Image" 
        class="w-full h-auto max-w-xs rounded-lg shadow-lg"
      >
      <h4 
        class="absolute bottom-2 left-2 bg-gray-800 bg-opacity-75 text-white text-sm font-medium py-1 px-2 rounded-lg">
        Priority: {{$img_info->priority}}
      </h4>
    </div>

    <!-- Button Section -->
    <button 
      type="submit" 
      form="form-delete" 
      class="px-4 py-2 bg-red-500 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-red-600 focus:ring-2 focus:ring-red-300 focus:outline-none transition-all">
      Delete
    </button>
    <a href= "/admin/carousel-image/edit/{{ $img_info['id'] }}" 
      class="px-4 py-2 bg-blue-500 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-300 focus:outline-none transition-all">EDIT</a>

    <!-- Hidden Delete Form -->
    <form 
      method="POST" 
      action="/admin/carousel-image/{{$img_info->id}}" 
      id="form-delete" 
      class="hidden">
      @csrf
      @method('DELETE')
    </form>
  </div>
</x-layout>
