<x-layout>
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
    @foreach ($img_info as $img)
      <div class="flex justify-center">
        <!-- Apply a fixed width and height to the anchor tag to control the image size -->
        <a href="/admin/carousel-image/{{ $img['id'] }}" class="block w-full h-auto">
          <img src="{{ asset('carousel-images/' . $img->img_path) }}" alt="Image" class="w-full h-48 object-cover rounded-lg shadow-lg">
        </a>
      </div>
    @endforeach
  </div>
</x-layout>
