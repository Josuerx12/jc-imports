<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>JC IMPORTS</title>

  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>

<body class="bg-gray-50 text-gray-800">
  <main>
    <header class="bg-white shadow-sm">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
        <div class="flex items-center gap-2 text-xl font-bold text-blue-600 cursor-default">
          <i data-lucide="plane" class="w-6 h-6"></i>
          <span class="tracking-wide">JC Imports</span>
        </div>

        <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
          <a href="/" class="hover:text-blue-600 transition">Página Inicial</a>
          <a href="/" class="hover:text-blue-600 transition">Categorias</a>
          @if (Auth::check() && Auth::user()->role === 'admin')
            <a href="/" class="hover:text-blue-600 transition">Dashboard</a>
          @endif
        </nav>

        @guest
          <div class="hidden md:flex items-center gap-4 text-sm">
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition">Login</a>
            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-1.5 rounded-lg hover:bg-blue-700 transition">
              Cadastrar-se
            </a>
        </div>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST" class="inline">
              @csrf
              <button type="submit" class="text-red-500 hover:text-red-700 text-sm cursor-pointer">Sair</button>
            </form>
        @endauth

        <div class="md:hidden">
          <button id="menu-button" class="text-gray-600 hover:text-blue-600">
            <i data-lucide="menu" class="w-6 h-6"></i>
          </button>
        </div>
      </div>

      <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2 bg-white border-t">
        <a href="/" class="block py-1 text-sm hover:text-blue-600">Página Inicial</a>
        <a href="/" class="block py-1 text-sm hover:text-blue-600">Categorias</a>
        @guest
          <a href="{{ route('login') }}" class="block py-1 text-sm hover:text-blue-600">Login</a>
          <a href="{{ route('register') }}" class="block py-1 text-sm hover:text-blue-600">Cadastrar-se</a>
        @endguest
      </div>
    </header>

    @yield('content')
  </main>

  <script>
    lucide.createIcons();

    document.getElementById('menu-button')?.addEventListener('click', () => {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });
  </script>
</body>
</html>
