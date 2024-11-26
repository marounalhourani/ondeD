<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MENU - 1D</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom style to fix the background */
    .fixed-bg {
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    /* Text shadow enhancement */
    .text-shadow {
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8); /* Stronger shadow */
    }

    /* Dark overlay behind text for better visibility */
    .text-overlay {
      background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent dark overlay */
      padding: 1rem;
      border-radius: 8px;
    }

    /* Hover effect on the header */
    .menu-link {
      transition: all 0.3s ease;
    }

    .menu-link:hover {
      background-color: white;
      color: #16a34a; /* Tailwind green-600 */
      cursor: pointer;
    }

    /* Description overflow fix */
    .truncate-description {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    /* Adjustments for mobile and tablet */
    @media (max-width: 640px) {
      .menu-link {
        padding: 12px 0;
      }

      .text-overlay {
        padding: 0.5rem;
      }
    }

    /* Ensure smooth scrolling for anchor links */
    html {
      scroll-behavior: smooth;
    }

    /* Ensure the full description is visible when expanded */
    .expanded-description {
      -webkit-line-clamp: unset;
      display: block;
      white-space: normal;
    }

    /* Align item name, description, and price */
    .item-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .item-name-description {
      max-width: 80%;
    }

    .item-price {
      margin-left: 20px;
      text-align: right;
    }

  </style>
</head>

<body class="m-0 p-0">

  <!-- Main Section with Fixed Background and Content Inside -->
  <section class="w-full h-auto min-h-screen fixed-bg bg-[url('/navimages/menu.webp')]">
    <!-- Green Overlay (background) -->
    <div class="absolute inset-0 bg-gradient-to-b from-green-600 to-transparent opacity-50 z-0"></div>

    <!-- Header (on top of the overlay) -->
    <header class="w-full flex flex-wrap py-16 text-3xl text-white relative z-10 px-8" role="navigation">
      @foreach (['Drinks', 'Food', 'Dessert', 'Specials'] as $cat)
        <a href="{{ route('menu.show', $cat) }}" 
           class="flex-1 text-center flex justify-center items-center border-l-4 border-white 
                  menu-link py-8 
                  {{ Request::is('menu/'.$cat) ? 'bg-white text-green-600 border-green-600' : 'text-white' }}
                  text-base sm:text-2xl lg:text-3xl"
           aria-label="{{ $cat }} menu">{{ strtoupper($cat) }}</a>
      @endforeach
    </header>
    
    
    
    <!-- Subcategories and Items Section inside the Main Section -->
    <section id="test" class="max-w-7xl mx-auto relative z-10 px-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($subcategories as $subcategory)
          <!-- Transparent background, but adding dark overlay for text visibility -->
          <div class="bg-transparent text-white rounded-lg shadow-lg p-6 transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
            <div class="text-overlay">
              <h2 class="text-xl font-semibold text-white mb-4 border-b pb-2 text-shadow">{{ $subcategory->name }}</h2>

              <!-- Items List -->
              <ul class="space-y-4">
                @foreach ($subcategory->items as $item)
                  <li>
                    <div class="item-container">
                      <!-- Item name and description -->
                      <div class="item-name-description">
                        <p class="text-white font-medium text-shadow">{{ $item->name }}</p>
                        <p class="text-sm text-white italic truncate-description text-shadow" data-full-text="{{ $item->description }}">
                          <span class="short-description">{{ Str::limit($item->description, 50) }}</span>
                          @if (strlen($item->description) > 50)
                            <a href="#" class="text-blue-400 expand-description underline">Read More</a>
                          @endif
                        </p>
                      </div>

                      <!-- Price on the right side -->
                      <span class="block mt-2 text-lg font-bold text-yellow-400 text-shadow item-price">${{ $item->price }}</span>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        @endforeach
      </div>
    </section>

  </section>

  <script>
    // Event listener for Read More / Read Less functionality
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.expand-description').forEach(button => {
        button.addEventListener('click', function (event) {
          event.preventDefault();
          const parent = this.closest('p');
          const fullText = parent.getAttribute('data-full-text');
          const shortDescription = parent.querySelector('.short-description');
          const descriptionText = parent.querySelector('span');

          if (this.textContent === "Read More") {
            descriptionText.textContent = fullText; // Show the full text
            parent.classList.add('expanded-description'); // Remove truncation
            this.textContent = "Read Less"; // Change the button text
          } else {
            descriptionText.textContent = fullText.slice(0, 50) + '...'; // Truncate the description again
            parent.classList.remove('expanded-description'); // Add truncation
            this.textContent = "Read More"; // Change the button text back
          }
        });
      });
    });
  </script>

</body>
</html>
