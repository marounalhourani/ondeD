<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="min-h-screen flex justify-center items-start relative bg-cover bg-center" 
    style="background-image: url('/activities/chill.webp'); background-attachment: fixed;">
    
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-black opacity-50 z-0"></div>
    <div class="text-center text-white max-w-lg w-full mx-auto relative z-10 pt-16 px-4 sm:px-8">
        
        <div class="relative mb-6">
            <img src="icon/schedule.svg" alt="Schedule" class="mx-auto w-60">
            <h1 class="text-4xl font-bold tracking-wide border-t-2 border-white uppercase"></h1>
        </div>

        <!-- Dates Section -->
        <div class="mt-6 space-y-4 relative">
            @foreach($x as $date => $events)
                <div class="category">
                    <div onclick="toggleCategory(this)" 
                        class="bg-red-600 text-white font-bold py-3 px-8 uppercase tracking-wide cursor-pointer rounded-lg shadow-md 
                        flex items-center justify-between transition-all duration-500 transform hover:scale-105 active:scale-95">
                        <span>{{ $date }}</span> 
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="category-content hidden mt-3 p-4 bg-gray-100 text-black rounded-lg transition-all duration-500 transform scale-95 opacity-0">
                        @if(!empty($events))
                            <ul class="text-left space-y-2">
                                @foreach($events as $event)
                                    <li class="py-2 border-b border-gray-300">{{ $event }}</li>
                                @endforeach
                            </ul>
                        @else
                            <div class="text-center">
                                <img src="icon/empty.svg" class="w-16 mx-auto mb-2" alt="No Events">
                                <p class="text-gray-500 italic">No events available</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function toggleCategory(element) {
            var categoryContent = element.nextElementSibling;
            categoryContent.classList.toggle('hidden');
            categoryContent.classList.toggle('scale-95');
            categoryContent.classList.toggle('opacity-0');
        }
    </script>
</body>
</html>
