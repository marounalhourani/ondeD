<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Global Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #FAFAFA;
      color: #333;
    }

    /* Navbar */
    .navbar {
      background-color: #1A202C; /* Dark background */
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
      transition: background-color 0.3s, color 0.3s;
    }

    .nav-link:hover {
      background-color: #4A90E2; /* Soft blue */
      color: white;
    }

    .button-logout {
      background-color: #E53E3E;
      transition: background-color 0.3s;
    }

    .button-logout:hover {
      background-color: #C53030;
    }

    /* Mobile Menu */
    .mobile-menu a {
      padding: 12px 16px;
      color: #4A5568;
    }

    .mobile-menu a:hover {
      background-color: #4A90E2;
      color: white;
    }

    /* Header */
    .header-title {
      font-size: 2rem;
      font-weight: 600;
      color: #2D3748;
    }

    /* Main Content */
    .main-content {
      background-color: white;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      padding: 24px;
    }

    /* Button styling */
    .button-logout {
      background-color: #E53E3E;
      color: white;
      padding: 10px 20px;
      font-weight: 500;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .button-logout:hover {
      background-color: #C53030;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .header-title {
        font-size: 1.75rem;
      }
    }

  </style>
</head>
<body class="h-full bg-gray-50">

<div class="min-h-full">
  <!-- Navbar -->
  <nav class="navbar">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="w-32 h-32" src="{{asset('logo/logo.svg')}}" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
            @foreach ($links as $link)
              <a href="{{ $link['url'] }}" class="nav-link px-3 py-2 text-sm font-medium text-white">{{ $link['label'] }}</a>
            @endforeach
              <button class="button-logout px-3 py-2 text-sm font-medium" type="submit" form="form-logout" aria-label="Logout">LOGOUT</button>
            </div>
          </div>
        </div>
        <div class="flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center p-2 text-gray-400 hover:text-white focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Mobile menu -->
  <div class="md:hidden hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            @foreach ($links as $link)
              <a href="{{ $link['url'] }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-600">{{ $link['label'] }}</a>
            @endforeach


      <button class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 bg-red-600 hover:bg-red-700 w-full mt-2" type="submit" form="form-logout" aria-label="Logout">LOGOUT</button>
    </div>
  </div>

  <!-- Header -->
  <header class="bg-white shadow-md py-6">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <h1 class="header-title">{{$header}}</h1>
    </div>
  </header>

  <!-- Main Content -->
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="main-content">
        {{$slot}}
      </div>
    </div>
  </main>
</div>

<form method="POST" action="/admin/logout" id="form-logout" class="hidden">
  @csrf
</form>

<script>
  // Toggle mobile menu
  document.querySelector('[aria-controls="mobile-menu"]').addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  });
</script>

</body>
</html>
