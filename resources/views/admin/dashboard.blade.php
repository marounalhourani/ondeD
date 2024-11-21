<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-800 to-gray-900 min-h-screen flex items-center justify-center">

    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            
            <!-- Menu Page Div -->
            <a href="{{ url('/menu') }}" class="group block p-10 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-lg shadow-xl transform transition-transform duration-500 hover:scale-105 hover:rotate-1">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-white mb-3 group-hover:text-pink-300 transition-colors duration-300">MENU</h2>
                    <p class="text-gray-200 opacity-80">Manage the Menu Here</p>
                </div>
            </a>

            <!-- Carousel Image Page Div -->
            <a href="{{ url('/admin/carousel-image') }}" class="group block p-10 bg-gradient-to-r from-teal-500 to-green-600 rounded-lg shadow-xl transform transition-transform duration-500 hover:scale-105 hover:-rotate-1">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-white mb-3 group-hover:text-yellow-300 transition-colors duration-300">Carousel Images</h2>
                    <p class="text-gray-200 opacity-80">Manage your Carousel Images Here</p>
                </div>
            </a>
        </div>
    </div>

</body>
</html>
