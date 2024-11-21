<section class="w-full h-screen bg-gray-200 flex flex-col">
  <!-- Full-width container -->
  <div id="container" class="flex flex-col w-full h-full">
    <!-- Links Section -->
    <div id="links" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 w-full h-1/3">
      <!-- Link 1 -->
      <div class="flex flex-col items-center justify-center text-white bg-[url('/navimages/menu.webp')] bg-cover bg-center relative">
        <div class="absolute inset-0 bg-green-600 opacity-75"></div>
        <img src="icon/menu.svg" alt="Menu" class="w-32 h-32 mb-4 relative animate-spin">
      </div>
      <!-- Link 2 -->
      <div class="flex flex-col items-center justify-center text-white bg-[url('/navimages/activities.webp')] bg-cover bg-center relative">
        <div class="absolute inset-0 bg-yellow-600 opacity-75"></div>
        <img src="icon/activities.svg" alt="Activities" class="w-32 h-32 mb-4 relative">
      </div>
      <!-- Link 3 -->
      <div class="flex flex-col items-center justify-center bg-[url('/navimages/boardgames.webp')] bg-cover bg-center relative">
        <div class="absolute inset-0 bg-red-600 opacity-75"></div>
        <img src="icon/boardgame.svg" alt="Board Games" class="w-32 h-32 relative">
      </div>
      <!-- Link 4 -->
      <div class="flex flex-col items-center justify-center bg-[url('/navimages/schedule.webp')] bg-cover bg-center relative" style="perspective: 1000px;">
        <div class="absolute inset-0 bg-blue-600 opacity-75"></div>
        <img src="icon/schedule.svg" alt="Schedule" class="w-32 h-32 relative rotateY-animation" style="transform-style: preserve-3d;">
      </div>
    </div>

    <!-- Community Section -->
    <div id="community" class="flex items-center justify-center w-full h-2/3 bg-white shadow-lg bg-[url('/navimages/community.webp')] bg-cover bg-center relative">
      <div class="absolute inset-0 bg-white opacity-50"></div>
      <button class="bg-transparent text-black border-2 border-black py-2 px-6 rounded-lg hover:bg-black hover:text-white transition relative">
        Join our community
      </button>
    </div>
    
  </div>
</section>