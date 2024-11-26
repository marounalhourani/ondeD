<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-pink-500 via-red-500 to-purple-600 flex items-center justify-center h-screen">
    <!-- Background Image & Blur Effect -->
    <div class="absolute inset-0 bg-cover bg-center bg-opacity-40" style="background-image: url('/path/to/your/image.jpg');"></div>

    <div class="relative z-10 bg-white p-10 rounded-3xl shadow-2xl w-full max-w-lg" data-aos="fade-up" data-aos-duration="1200">
        <div class="text-center mb-8">
            <h2 class="text-5xl font-extrabold text-gray-800 mb-4 tracking-tight">Admin Login</h2>
            <p class="text-lg font-semibold text-gray-600">Access the admin panel with your credentials</p>
        </div>

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf

            <!-- Username Field -->
            <div class="mb-6">
                <label for="name" class="block text-xl font-semibold text-gray-800">Admin Username</label>
                <input type="text" id="name" name="name" class="w-full px-6 py-4 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-4 focus:ring-pink-500 focus:border-pink-500 transition duration-300 hover:border-pink-400" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-6">
                <label for="password" class="block text-xl font-semibold text-gray-800">Admin Password</label>
                <input type="password" id="password" name="password" class="w-full px-6 py-4 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-4 focus:ring-pink-500 focus:border-pink-500 transition duration-300 hover:border-pink-400" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white py-4 rounded-xl hover:scale-105 transition duration-300 transform shadow-lg hover:shadow-xl">Login</button>

            @if (session('error'))
                <div class="mt-4 text-center text-red-500">
                    <p>{{ session('error') }}</p>
                </div>
            @endif
        </form>
    </div>

    <script>
        AOS.init(); // Initialize AOS (Animate On Scroll) for smooth scrolling animations
    </script>
</body>

</html>
