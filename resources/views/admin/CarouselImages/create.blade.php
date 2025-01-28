<x-layout
:links="[
    ['url' => '/admin/carousel-image', 'label' => 'All pictures for Carousel'],
    ['url' => '/admin/carousel-image/create', 'label' => 'Add new image']]"
>
  <x-slot name="header">
CREATE A NEW CAROUSEL IMAGE WITH TEXTS
</x-slot>
  <form method="POST" action="/admin/carousel-image" enctype="multipart/form-data" class="max-w-3xl mx-auto p-8 bg-white rounded-lg shadow-lg" id="carouselForm" autocomplete="off">
    @csrf
    <div class="space-y-6">
      <div class="border-b pb-6">
        <div class="grid grid-cols-1 gap-y-6">
          <!-- Cover Photo Section -->
          <div>
            <label for="cover-photo" class="text-xl font-semibold text-gray-800">Cover Photo</label>
            <div class="mt-4 flex justify-center items-center p-6 border-2 border-dashed border-gray-300 rounded-md hover:border-indigo-500 transition-all">
              <label for="file-upload" class="bg-indigo-600 text-white py-2 px-4 rounded cursor-pointer hover:bg-indigo-700 transition-all">
                Upload a file
                <input id="file-upload" name="file-upload" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)" required>
              </label>
              <p class="mt-2 text-sm text-gray-500">PNG, JPG, GIF, WebP up to 10MB</p>
              <x-span-input id="file-upload-error"></x-span-input>

              <!-- Image Preview Section -->
              <div id="image-preview-container" class="mt-4 hidden w-48 h-48 rounded-md overflow-hidden shadow-md relative">
                <img id="image-preview" src="#" alt="Image preview" class="w-full h-full object-cover">
                <button type="button" id="remove-preview" class="absolute top-0 right-0 bg-red-600 text-white p-2 rounded-full shadow-lg hover:bg-red-700 transition-all" onclick="removeImage()">X</button>
              </div>
            </div>
          </div>

          <x-input-field name="event-name" label="Event Name" placeholder="Enter event name" />
          <x-span-input id="event-name-error"></x-span-input>


          <x-input-field name="right" label="Right Text" placeholder="Enter right-side text" />
          <x-span-input id="right-error"></x-span-input>

          <x-input-field name="left" label="Left Text" placeholder="Enter left-side text" />
          <x-span-input  id="left-error"></x-span-input>

          <x-input-field name="buttom" label="buttom Text" placeholder="Buttom" />
          <x-span-input id="buttom-error"></x-span-input>

          <x-input-field name="priority" label="Priority" placeholder="Enter priority" />
          <x-span-input id="priority-error"></x-span-input>
        </div>
      </div>

      <!-- Submit Section -->
      <div class="mt-6 flex justify-end gap-6">
        
        <a href="/admin/carousel-image/" type="button" class="text-lg text-gray-600 hover:text-gray-800">Cancel</a>
      
        <button type="submit" class="bg-indigo-600 text-white py-3 px-8 rounded-md hover:bg-indigo-700 transition-all shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
          Save
        </button>
      </div>
    </div>
  </form>

  <script>
    document.getElementById("carouselForm").addEventListener("submit", function (e) {
      let isValid = true;

      // Validation rules
      const fileInput = document.getElementById("file-upload");
      const eventName = document.querySelector("input[name='event-name']");
      const month = document.querySelector("input[name='month']");
      const time = document.querySelector("input[name='time']");
      const rightText = document.querySelector("input[name='right']");
      const leftText = document.querySelector("input[name='left']");
      const description = document.querySelector("input[name='description']");
      const priority = document.querySelector("input[name='priority']");

      // Clear previous error messages
      document.querySelectorAll(".text-red-500").forEach(el => el.textContent = "");

      // File validation
      if (!fileInput.files[0]) {
        document.getElementById("file-upload-error").textContent = "Cover photo is required.";
        isValid = false;
      } else if (!["image/png", "image/jpg", "image/jpeg","image/webp"].includes(fileInput.files[0].type)) {
        document.getElementById("file-upload-error").textContent = "Only PNG, JPG, or JPEG WebP files are allowed.";
        isValid = false;
      } else if (fileInput.files[0].size > 10240 * 1024) { // 10 MB limit
        document.getElementById("file-upload-error").textContent = "File must be less than 10 MB.";
        isValid = false;
      }

      // Other fields validation
      if (!eventName.value) {
        document.getElementById("event-name-error").textContent = "Event name is required.";
        isValid = false;
      }


      if (!rightText.value) {
        document.getElementById("right-error").textContent = "Right text is required.";
        isValid = false;
      }
      if (!leftText.value) {
        document.getElementById("left-error").textContent = "Left text is required.";
        isValid = false;
      }

      if (!priority.value || isNaN(priority.value) || priority.value < 1) {
        document.getElementById("priority-error").textContent = "Priority must be an integer greater than or equal to 1.";
        isValid = false;
      }

      if (!isValid) {
        e.preventDefault(); // Prevent form submission if there are validation errors
      }
    });

    function previewImage(event) {
      const file = event.target.files[0];
      const previewContainer = document.getElementById('image-preview-container');
      const preview = document.getElementById('image-preview');

      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.src = e.target.result;
          previewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
      }
    }

    function removeImage() {
      document.getElementById('file-upload').value = '';
      document.getElementById('image-preview').src = '#';
      document.getElementById('image-preview-container').classList.add('hidden');
    }
  </script>
</x-layout>
