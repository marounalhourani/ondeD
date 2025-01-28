<x-layout
:links="[
    ['url' => '/admin/carousel-image', 'label' => 'All pictures for Carousel'],
    ['url' => '/admin/carousel-image/create', 'label' => 'Add new image']]"
>
  <x-slot name="header">
    DISPLAY ALL IMAGE CAROUSELS 
</x-slot>
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
    @foreach ($img_info as $img)
      <div class="relative flex justify-center">
        <!-- Anchor wrapping the image -->
        <a href="/admin/carousel-image/{{ $img['id'] }}" class="block w-full h-auto relative">
          <!-- Image -->
          <img src="{{ asset('carousel-images/' . $img->img_path) }}" alt="Image" class="w-full h-48 object-cover rounded-lg shadow-lg">
          <!-- Overlay for priority -->
          <div class="absolute bottom-2 left-2 bg-black bg-opacity-60 text-white text-sm px-2 py-1 rounded">
            Priority: {{ $img->priority }}
          </div>
        </a>
      </div>
    @endforeach
  </div>
</x-layout>
