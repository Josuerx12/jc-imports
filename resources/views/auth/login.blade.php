@extends('layouts.auth')

@section('title', 'Autentique-se')

@section('content')
  <main class="w-full min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-lg">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
        Autentique-se para continuar
      </h2>

      <form action="{{ route('loginValidate') }}" method="POST" class="space-y-5">
        @csrf

        <div class="space-y-1">
          <label for="auth.email" class="text-sm font-medium text-gray-700">Email</label>
          <div class="flex items-center px-3 border border-gray-300 rounded-lg bg-white focus-within:ring-2 focus-within:ring-blue-500">
            <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>
            <input
              id="auth.email"
              value="{{ old('email') }}"
              name="email"
              type="email"
              required
              placeholder="seu@email.com"
              class="w-full px-2 py-2 text-sm bg-transparent focus:outline-none"
            >
          </div>
          @error('login')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="space-y-1">
          <label for="auth.password" class="text-sm font-medium text-gray-700">Senha</label>
          <div class="flex items-center px-3 border border-gray-300 rounded-lg bg-white focus-within:ring-2 focus-within:ring-blue-500">
            <i data-lucide="lock" class="w-5 h-5 text-gray-400"></i>
            <input
              id="auth.password"
              name="password"
              value="{{ old('password') }}"
              type="password"
              required
              placeholder="••••••••"
              class="w-full px-2 py-2 text-sm bg-transparent focus:outline-none"
            >
          </div>

        @error('password')
          <span class="text-danger">{{ $message }}</span>
        @enderror

        </div>

        @if ($errors->has('message'))
          <div class="bg-red-500 text-white p-2 rounded">
            {{ $errors->first('message') }}
          </div>
        @endif

        <button
          type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-lg transition duration-200"
        >
          Entrar
        </button>
      </form>
    </div>
  </main>
@endsection