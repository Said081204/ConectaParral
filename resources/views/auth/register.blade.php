@extends('layouts.auth')
@section('title', 'Crear cuenta')

@section('content')
  <div class="text-center">
    <h1 class="text-2xl 2xl:text-3xl font-extrabold tracking-tight text-gray-900">
      Crear cuenta
    </h1>
    <p class="mt-1 text-sm 2xl:text-base text-gray-600">
      Regístrate para comprar en ConectaParral.
    </p>
  </div>

  @if ($errors->any())
    <div class="mt-5 p-3 rounded-lg bg-red-50 border border-red-200 text-sm text-red-700">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('register.store') }}" class="mt-6 space-y-4">
    @csrf

    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre</label>
      <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
        class="w-full h-11 2xl:h-12 px-4 rounded-lg border border-gray-300 bg-white
               focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-[#1E3A8A]"
        placeholder="Nombre y apellido">
    </div>

    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Correo</label>
      <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
        class="w-full h-11 2xl:h-12 px-4 rounded-lg border border-gray-300 bg-white
               focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-[#1E3A8A]"
        placeholder="tucorreo@gmail.com">
    </div>

    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Contraseña</label>
      <input type="password" name="password" required autocomplete="new-password"
        class="w-full h-11 2xl:h-12 px-4 rounded-lg border border-gray-300 bg-white
               focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-[#1E3A8A]"
        placeholder="Mínimo 8 caracteres">
      <p class="mt-1 text-xs text-gray-500">Usa al menos 8 caracteres.</p>
    </div>

    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Confirmar contraseña</label>
      <input type="password" name="password_confirmation" required autocomplete="new-password"
        class="w-full h-11 2xl:h-12 px-4 rounded-lg border border-gray-300 bg-white
               focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-[#1E3A8A]"
        placeholder="Repite tu contraseña">
    </div>

    <button type="submit"
      class="w-full h-11 2xl:h-12 rounded-lg bg-[#1E3A8A] text-white font-extrabold
             hover:bg-blue-800 transition">
      Crear cuenta
    </button>

    <div class="relative pt-4">
      <div class="h-px bg-gray-200"></div>
      <span class="absolute left-1/2 -translate-x-1/2 -top-2 bg-white px-3 text-xs text-gray-500">
        ¿Ya tienes cuenta?
      </span>
    </div>

    <a href="{{ route('login') }}"
      class="w-full h-11 2xl:h-12 rounded-lg border border-gray-300 bg-white
             font-extrabold text-gray-900 inline-flex items-center justify-center
             hover:bg-gray-50 transition">
      Iniciar sesión
    </a>

    <p class="text-xs text-gray-500 leading-relaxed text-center">
      Al registrarte aceptas nuestras
      <a href="{{ url('/terminos') }}" class="text-[#1E3A8A] font-semibold hover:underline">Condiciones</a>
      y
      <a href="{{ url('/privacidad') }}" class="text-[#1E3A8A] font-semibold hover:underline">Privacidad</a>.
    </p>
  </form>
@endsection
