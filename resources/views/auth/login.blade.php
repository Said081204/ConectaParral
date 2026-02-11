@extends('layouts.auth')

@section('title', 'Iniciar sesión')

@section('content')
  <div class="text-center">
    <h1 class="text-2xl 2xl:text-3xl font-extrabold tracking-tight text-gray-900">
      Iniciar sesión
    </h1>
    <p class="mt-1 text-sm 2xl:text-base text-gray-600">
      Accede con tu correo y contraseña.
    </p>
  </div>

  {{-- Error general --}}
  @if ($errors->any())
    <div class="mt-5 p-3 rounded-lg bg-red-50 border border-red-200 text-sm text-red-700">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-4">
    @csrf

    {{-- Email --}}
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">
        Correo
      </label>
      <input
        type="email"
        name="email"
        value="{{ old('email') }}"
        required
        autocomplete="email"
        placeholder="tucorreo@gmail.com"
        class="w-full h-11 2xl:h-12 px-4 rounded-lg border border-gray-300 bg-white
               focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-[#1E3A8A]"
      >
      @error('email')
        <p class="mt-1 text-xs text-red-600 font-semibold">{{ $message }}</p>
      @enderror
    </div>

    {{-- Password --}}
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">
        Contraseña
      </label>
      <input
        type="password"
        name="password"
        required
        autocomplete="current-password"
        placeholder="••••••••"
        class="w-full h-11 2xl:h-12 px-4 rounded-lg border border-gray-300 bg-white
               focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-[#1E3A8A]"
      >
      @error('password')
        <p class="mt-1 text-xs text-red-600 font-semibold">{{ $message }}</p>
      @enderror
    </div>

    {{-- Remember + volver --}}
    <div class="flex items-center justify-between text-sm 2xl:text-base">
      <label class="inline-flex items-center gap-2 select-none">
        <input type="checkbox" name="remember" class="accent-[#1E3A8A]">
        <span class="text-gray-600">Recordarme</span>
      </label>

      <a href="{{ url('/') }}" class="text-[#1E3A8A] font-semibold hover:underline">
        Volver
      </a>
    </div>

    {{-- Submit --}}
    <button
      type="submit"
      class="w-full h-11 2xl:h-12 rounded-lg bg-[#1E3A8A] text-white font-extrabold
             hover:bg-blue-800 transition"
    >
      Entrar
    </button>

    {{-- Divider --}}
    <div class="relative pt-4">
      <div class="h-px bg-gray-200"></div>
      <span class="absolute left-1/2 -translate-x-1/2 -top-2 bg-white px-3 text-xs text-gray-500">
        ¿No tienes cuenta?
      </span>
    </div>

    {{-- Register --}}
    <a
      href="{{ route('register') }}"
      class="w-full h-11 2xl:h-12 rounded-lg border border-gray-300 bg-white
             font-extrabold text-gray-900 inline-flex items-center justify-center
             hover:bg-gray-50 transition"
    >
      Crear cuenta
    </a>

    {{-- Legal --}}
    <p class="text-xs text-gray-500 leading-relaxed text-center">
      Al continuar aceptas nuestras
      <a href="{{ url('/terminos') }}" class="text-[#1E3A8A] font-semibold hover:underline">
        Condiciones
      </a>
      y
      <a href="{{ url('/privacidad') }}" class="text-[#1E3A8A] font-semibold hover:underline">
        Privacidad
      </a>.
    </p>
  </form>
@endsection
