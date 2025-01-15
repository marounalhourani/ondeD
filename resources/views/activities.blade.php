<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    html {
      scroll-behavior: smooth;
    }

    /* Animation for rotating an element */
    @keyframes rotateY {
      from {
        transform: rotateY(0deg);
      }
      to {
        transform: rotateY(360deg);
      }
    }

    /* Applying the rotation animation to elements with this class */
    .rotateY-animation:hover {
      animation: rotateY 2s linear infinite;
      transform-style: preserve-3d;
    }

    /* Styling for the description text */
    .description {
      opacity: 0;
      visibility: hidden;
      transform: scale(0.8);
      transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
    }

    /* Hide text and show description on hover */
    .hover\:show-description:hover .description {
      opacity: 1;
      visibility: visible;
      transform: scale(1);
    }

    /* Hide the text inside the item when hovering */
    .hover\:show-description:hover .text-content {
      opacity: 0;
      visibility: hidden;
    }

    /* For mobile tap, show description when clicked */
    .tap-to-show-description {
      cursor: pointer;
    }

    .tap-to-show-description.active .description {
      opacity: 1;
      visibility: visible;
      transform: scale(1);
    }

    .tap-to-show-description.active .text-content {
      opacity: 0;
      visibility: hidden;
    }
  </style>
</head>
<body>

  <section class="flex flex-col overflow-y-auto">
    <!-- First div (not modified) -->
    <div class="h-[60vh] flex flex-col items-center justify-center text-white bg-[url('/activities/venue.webp')] bg-cover bg-[center_top_30%] bg-no-repeat relative">
      <div class="absolute inset-0 bg-yellow-600 opacity-65"></div>
      <img src="icon/activities.svg" alt="Activities" class="w-64 h-64 relative rotateY-animation" style="transform-style: preserve-3d;">
    </div>

    <!-- Second flex item: Championship with hover effect -->
    <div class="h-[20vh] flex flex-col items-center justify-center text-white bg-[url('/activities/chill.webp')] bg-cover bg-[center_top_25%] bg-no-repeat relative hover:show-description tap-to-show-description" onclick="this.classList.toggle('active')">
      <div class="absolute inset-0 bg-green-600 opacity-65"></div>
      <div class="text-2xl text-black relative text-content">Championship</div>
      <div class="description absolute inset-0 flex items-center justify-center text-white text-xl font-semibold bg-black bg-opacity-60 p-4">
        A fun and competitive event where champions are born!
      </div>
    </div>

    <!-- Third flex item: Events with hover effect -->
    <div class="h-[20vh] flex flex-col items-center justify-center text-white bg-[url('/activities/chill.webp')] bg-cover bg-[center_top_25%] bg-no-repeat relative hover:show-description tap-to-show-description" onclick="this.classList.toggle('active')">
      <div class="absolute inset-0 bg-red-600 opacity-65"></div>
      <div class="text-2xl text-black relative text-content">Events</div>
      <div class="description absolute inset-0 flex items-center justify-center text-white text-xl font-semibold bg-black bg-opacity-60 p-4">
        Exciting events that bring people together!
      </div>
    </div>

    <!-- Fourth flex item: Music Nights with hover effect -->
    <div class="h-[20vh] flex flex-col items-center justify-center text-white bg-[url('/activities/table.webp')] bg-cover bg-[center_top_25%] bg-no-repeat relative hover:show-description tap-to-show-description" onclick="this.classList.toggle('active')">
      <div class="absolute inset-0 bg-yellow-300 opacity-65"></div>
      <div class="text-2xl text-black relative text-content">Music Nights</div>
      <div class="description absolute inset-0 flex items-center justify-center text-white text-xl font-semibold bg-black bg-opacity-60 p-4">
        A night of unforgettable music and fun!
      </div>
    </div>

    <!-- Fifth flex item: Trivia Nights with hover effect -->
    <div class="h-[20vh] flex flex-col items-center justify-center text-white bg-[url('/activities/table.webp')] bg-cover bg-[center_top_25%] bg-no-repeat relative hover:show-description tap-to-show-description" onclick="this.classList.toggle('active')">
      <div class="absolute inset-0 bg-blue-600 opacity-65"></div>
      <div class="text-2xl text-black relative text-content">Trivia Nights</div>
      <div class="description absolute inset-0 flex items-center justify-center text-white text-xl font-semibold bg-black bg-opacity-60 p-4">
        Test your knowledge and win exciting prizes!
      </div>
    </div>

    <!-- Sixth flex item: Book Club with hover effect -->
    <div class="h-[20vh] flex flex-col items-center justify-center text-white bg-[url('/activities/table.webp')] bg-cover bg-[center_top_25%] bg-no-repeat relative hover:show-description tap-to-show-description" onclick="this.classList.toggle('active')">
      <div class="absolute inset-0 bg-blue-400 opacity-65"></div>
      <div class="text-2xl text-black relative text-content">Book Club</div>
      <div class="description absolute inset-0 flex items-center justify-center text-white text-xl font-semibold bg-black bg-opacity-60 p-4">
        Join us for interesting book discussions!
      </div>
    </div>

    <!-- Seventh flex item: Workshops with hover effect -->
    <div class="h-[20vh] flex flex-col items-center justify-center text-white bg-[url('/activities/table.webp')] bg-cover bg-[center_top_25%] bg-no-repeat relative hover:show-description tap-to-show-description" onclick="this.classList.toggle('active')">
      <div class="absolute inset-0 bg-slate-400 opacity-65"></div>
      <div class="text-2xl text-black relative text-content">Workshops</div>
      <div class="description absolute inset-0 flex items-center justify-center text-white text-xl font-semibold bg-black bg-opacity-60 p-4">
        Enhance your skills through engaging workshops!
      </div>
    </div>

    <!-- Eighth flex item: Dungeon and Dragons with hover effect -->
    <div class="h-[20vh] flex flex-col items-center justify-center text-white bg-[url('/activities/table.webp')] bg-cover bg-[center_top_25%] bg-no-repeat relative hover:show-description tap-to-show-description" onclick="this.classList.toggle('active')">
      <div class="absolute inset-0 bg-green-500 opacity-65"></div>
      <div class="text-2xl text-black relative text-content">Dungeon and Dragons</div>
      <div class="description absolute inset-0 flex items-center justify-center text-white text-xl font-semibold bg-black bg-opacity-60 p-4">
        An epic adventure in the world of imagination!
      </div>
    </div>
  
  </section>

  <script>
    // Optional: Toggle active class on click for mobile devices
    document.querySelectorAll('.tap-to-show-description').forEach(function(item) {
      item.addEventListener('click', function() {
        this.classList.toggle('active');
      });
    });
  </script>

</body>
</html>