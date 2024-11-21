<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Admin Login</h2>

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            <!-- Username Field -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Admin Username</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            <!-- Password Field -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Admin Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">Login</button>
        
            @if (session('error'))
                <div class="mt-4 text-center text-red-500">
                    <p>{{ session('error') }}</p>
                </div>
            @endif
        </form>
        
    </div>
</body>

</html>
