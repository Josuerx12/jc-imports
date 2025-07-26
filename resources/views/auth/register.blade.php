@extends('layouts.auth')

@section('title', 'Cadastre-se')

@section('content')
  <main class="w-full min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-lg">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
        Cadastre-se para comprar nossos produtos
      </h2>

      <form action="{{ route('saveRegister') }}" method="POST" class="space-y-5">
        @csrf

        <div class="space-y-1">
          <label for="auth.name" class="text-sm font-medium text-gray-700">Nome</label>
          <div class="flex items-center px-3 border border-gray-300 rounded-lg bg-white focus-within:ring-2 focus-within:ring-blue-500">
            <i data-lucide="user" class="w-5 h-5 text-gray-400"></i>
            <input
              id="auth.name"
              name="name"
              value="{{ old('name') }}"
              type="text"
              required
              placeholder="Seu nome completo"
              class="w-full px-2 py-2 text-sm bg-transparent focus:outline-none"
            >
          </div>
          @error('name')
            <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div class="space-y-1">
          <label for="auth.email" class="text-sm font-medium text-gray-700">Email</label>
          <div class="flex items-center px-3 border border-gray-300 rounded-lg bg-white focus-within:ring-2 focus-within:ring-blue-500">
            <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>
            <input
              id="auth.email"
              name="email"
              value="{{ old('email') }}"
              type="email"
              required
              placeholder="exemplo@dominio.com"
              class="w-full px-2 py-2 text-sm bg-transparent focus:outline-none"
            >
          </div>
          @error('email')
            <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div class="space-y-1">
          <label for="auth.password" class="text-sm font-medium text-gray-700">Senha</label>
          <div class="flex items-center px-3 border border-gray-300 rounded-lg bg-white focus-within:ring-2 focus-within:ring-blue-500">
            <i data-lucide="lock" class="w-5 h-5 text-gray-400"></i>
            <input
              id="auth.password"
              value="{{ old('password') }}"
              name="password"
              type="password"
              required
              placeholder="••••••••"
              class="w-full px-2 py-2 text-sm bg-transparent focus:outline-none"
            >
          </div>
          @error('password')
            <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div class="space-y-1">
          <label for="auth.confirm.password" class="text-sm font-medium text-gray-700">Confirmar Senha</label>
          <div class="flex items-center px-3 border border-gray-300 rounded-lg bg-white focus-within:ring-2 focus-within:ring-blue-500">
            <i data-lucide="shield-check" class="w-5 h-5 text-gray-400"></i>
            <input
              id="auth.confirm.password"
              value="{{ old('password_confirmation') }}"
              name="password_confirmation"
              type="password"
              required
              placeholder="Confirme a senha"
              class="w-full px-2 py-2 text-sm bg-transparent focus:outline-none"
            >
          </div>

          @error('password_confirmation')
            <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <button
          type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-lg transition duration-200"
        >
          Cadastrar
        </button>
      </form>
    </div>
  </main>
@endsection