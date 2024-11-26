<x-layout>
  <x-slot name="header">
Edit TEXT for This photo
    </x-slot>
  <!-- Picture Preview Section -->
  <div class="max-w-3xl mx-auto my-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Carousel Image</h2>
    <div class="w-full h-64 bg-gray-100 flex justify-center items-center rounded-lg shadow-lg overflow-hidden">
      <img 
        src="{{ asset('carousel-images/' . $img_info->img_path) }}" 
        alt="Carousel Image" 
        class="object-cover w-full h-full"
      >
    </div>
  </div>

  <!-- Edit Form -->
  <form 
    method="POST" 
    action="/admin/carousel-image/{{ $img_info->id }}" 
    enctype="multipart/form-data" 
    class="max-w-3xl mx-auto p-8 bg-white rounded-lg shadow-lg" 
    autocomplete="off"
  >
    @csrf
    @method('PUT')

    <div class="space-y-6">
      <!-- Priority -->

      <!-- Left Text -->
      <x-input-field 
        name="left" 
        label="Left Text" 
        value="{{ $img_info->left }}" 
        placeholder="Enter left-side text" 
      />
      <x-span-input id="left-error"></x-span-input>

      <!-- Right Text -->
      <x-input-field 
        name="right" 
        label="Right Text" 
        value="{{ $img_info->right }}" 
        placeholder="Enter right-side text" 
      />
      <x-span-input id="right-error"></x-span-input>

      <!-- Button Text -->
      <x-input-field 
        name="buttom" 
        label="Button Text" 
        value="{{ $img_info->buttom }}" 
        placeholder="Enter button text" 
      />
      <x-span-input id="buttom-error"></x-span-input>

      <!-- Submit Section -->
      <div class="mt-6 flex justify-end gap-6">
        <a href="/admin/carousel-image" class="text-lg text-gray-600 hover:text-gray-800">Cancel</a>
        <button 
          type="submit" 
          class="bg-indigo-600 text-white py-3 px-8 rounded-md hover:bg-indigo-700 transition-all shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          Update
        </button>
      </div>
    </div>
  </form>
</x-layout>
