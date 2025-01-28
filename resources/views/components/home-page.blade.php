@props(['carouselImages'])

<section class="w-full h-screen relative flex flex-col" style="font-family:Monotype Old English Text W01 ">
  
  {{-- Carousel images --}}
  <div class="absolute top-0 left-0 w-full h-full z-0">
    <div id="carousel" class="relative w-full h-full">
      <div class="carousel-inner relative w-full h-full">
        @foreach ($carouselImages as $index => $image)
        <div class="carousel-item w-full h-full absolute top-0 left-0 transition-opacity duration-500 ease-in-out opacity-0 {{ $index === 0 ? 'opacity-100' : '' }}">
          <!-- Background Image -->
          <img src="{{ asset('carousel-images/' . $image->img_path) }}" alt="Carousel Image" class="w-full h-full object-cover opacity-80">
          
          <!-- Black Overlay -->
          <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>
          
          {{-- Text --}}
          <div class="absolute inset-0 flex flex-col items-center justify-center lg:justify-between px-6 sm:px-8 md:px-16 lg:px-28 z-10 ">
            <!-- Left Text -->
            <div id="left" class="absolute text-white lg:bottom-16 lg:left-16 flex flex-col items-center lg:items-start">
              <p class="text-2xl sm:text-3xl md:text-5xl lg:text-7xl font-bold mb-3 sm:mb-4 md:mb-6 lg:mb-8">
                {{$image->left}}
              </p>
              <p class="text-xl sm:text-2xl md:text-4xl lg:text-6xl">
                {{$image->buttom}}
              </p>
            </div>
          
            <!-- Right Text -->
            <div id="right" class="absolute text-white lg:bottom-16 lg:right-16 text-lg sm:text-xl md:text-2xl lg:text-4xl font-semibold mt-32 lg:mt-0  pt-3 sm:pt-4 md:pt-32 lg:pt-8">
              {{$image->right}}
            </div>
          </div>
          
          
        </div>
        @endforeach
      </div>

      <!-- Carousel Controls -->
      <button id="prevButton" class="absolute top-1/2 left-4 transform -translate-y-1/2 text-white text-5xl font-bold z-20 hover:scale-110 transition-transform">
        &#10094;
      </button>
      <button id="nextButton" class="absolute top-1/2 right-4 transform -translate-y-1/2 text-white text-5xl font-bold z-20 hover:scale-110 transition-transform">
        &#10095;
      </button>
    </div>
  </div>

  <!-- Header Section -->
<!-- Updated Header -->
<header class="absolute top-0 left-0 w-full flex items-center justify-between px-8 text-white z-20 mt-1">
  <!-- Logo Section -->
  <div class="flex items-center space-x-3">
    <img src="logo/logo.svg" alt="Logo" class="h-32 w-auto"> <!-- Adjusted height to make the logo bigger -->
  </div>

  <!-- Hamburger Button -->
  <div id="menuButton" class="flex flex-col justify-center items-center space-y-1 cursor-pointer md:hidden">
    <div class="w-6 h-1 bg-white rounded transition-all"></div>
    <div class="w-6 h-1 bg-white rounded transition-all"></div>
    <div class="w-6 h-1 bg-white rounded transition-all"></div>
  </div>

  <!-- Navigation Links for Desktop -->
  <nav class="hidden md:flex space-x-8 text-lg font-semibold">
    <a href="/menu/Drinks" class="hover:text-gray-300 transition-colors">MENU</a>
    <a href="/activity" class="hover:text-gray-300 transition-colors">ACTIVITIES</a>
    <a href="/boardgames" class="hover:text-gray-300 transition-colors">BOARD GAMES</a>
    <a href="/schedule" class="hover:text-gray-300 transition-colors">SCHEDULE</a>
  </nav>
</header>

<!-- Fullscreen Mobile Menu -->
<div id="mobileMenu" class="fixed inset-0 bg-gradient-to-br from-gray-900 via-black to-gray-800 text-white z-50 hidden flex flex-col justify-between items-center p-8 transition-all duration-500 ease-in-out">
  <!-- Close Button -->
  <button id="closeMenuButton" class="absolute top-5 right-5 text-4xl font-bold text-gray-400 hover:text-white focus:outline-none transition-transform duration-300 transform hover:rotate-90">
    &times;
  </button>

  <!-- Navigation Links -->
  <nav class="flex flex-col items-center space-y-8 text-2xl font-semibold text-center tracking-wide">
    <a href="/menu/Drinks" class="relative group">
      <span class="text-gray-300 group-hover:text-white transition duration-300">MENU</span>
      <div class="absolute left-0 bottom-0 h-1 w-0 bg-white group-hover:w-full transition-all duration-300"></div>
    </a>
    <a href="/activity" class="relative group">
      <span class="text-gray-300 group-hover:text-white transition duration-300">ACTIVITIES</span>
      <div class="absolute left-0 bottom-0 h-1 w-0 bg-white group-hover:w-full transition-all duration-300"></div>
    </a>
    <a href="/boardgames" class="relative group">
      <span class="text-gray-300 group-hover:text-white transition duration-300">BOARD GAMES</span>
      <div class="absolute left-0 bottom-0 h-1 w-0 bg-white group-hover:w-full transition-all duration-300"></div>
    </a>
    <a href="/schedule" class="relative group">
      <span class="text-gray-300 group-hover:text-white transition duration-300">SCHEDULE</span>
      <div class="absolute left-0 bottom-0 h-1 w-0 bg-white group-hover:w-full transition-all duration-300"></div>
    </a>
  </nav>

  <!-- Social Media Links -->
  <div class="flex space-x-6 mt-6">
    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
      <i class="fab fa-facebook-f text-2xl"></i>
    </a>
    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
      <i class="fab fa-twitter text-2xl"></i>
    </a>
    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
      <i class="fab fa-instagram text-2xl"></i>
    </a>
  </div>

  <!-- Decorative Elements -->
  <div class="absolute inset-x-0 bottom-10 flex justify-center space-x-4">
    <div class="w-6 h-6 border-2 border-gray-500 rounded-full animate-bounce"></div>
    <div class="w-6 h-6 border-2 border-gray-400 rounded-full animate-bounce delay-200"></div>
    <div class="w-6 h-6 border-2 border-gray-300 rounded-full animate-bounce delay-400"></div>
  </div>
</div>

</section>
