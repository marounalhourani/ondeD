<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board Games</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex justify-center items-start relative bg-cover bg-center" style="background-image: url('/activities/chill.webp'); background-attachment: fixed;">
    <div class="absolute inset-0 bg-black opacity-50 z-0"></div>

    <div class="text-center text-white max-w-md relative z-10 pt-16">
        <!-- Dice Icon and Title -->
        <div class="relative mb-4">
            <div class="text-6xl font-bold">🎲🎲</div>
        </div>
        <h1 class="text-4xl font-bold tracking-wide border-t-2 border-b-2 border-white py-2">TYPE OF GAMES</h1>

        <!-- Game Categories -->
        <div class="mt-6 space-y-3 relative">
            @foreach($x as $category => $games)
                <div class="category">
                    <div onclick="toggleCategory(this)" 
                        class="bg-red-600 text-white font-bold py-2 px-6 uppercase tracking-wide cursor-pointer rounded-md shadow-lg transition duration-300 transform hover:scale-105">
                        {{ $category }}
                    </div>
                    <!-- Dropdown content (will be inline with the rest of the content) -->
                    <div class="category-content hidden mt-2 p-4 bg-gray-100 text-black rounded-md">
                        @if(count($games) > 0)
                            <ul class="text-left space-y-2">
                                @foreach($games as $game)
                                    <li>{{ $game }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center">No games listed</p>
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
        }
    </script>
</body>
</html>
