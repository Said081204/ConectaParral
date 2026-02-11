@extends('layouts.auth') {{-- o el layout que estés usando para login/register --}}

@section('title', 'Verifica tu correo')

@section('content')

<div class="text-center">

  {{-- Título --}}
  <h1 class="text-2xl font-extrabold text-gray-900">
    Verifica tu correo electrónico
  </h1>

  {{-- Mensaje --}}
  <p class="mt-3 text-gray-600 leading-relaxed">
    Te enviamos un enlace de verificación a tu correo.
    <br class="hidden sm:block">
    Revisa tu bandeja de entrada o spam para continuar.
  </p>

  {{-- Mensaje de éxito al reenviar --}}
  @if (session('status') === 'verification-link-sent')
    <div class="mt-4 rounded-lg bg-green-50 border border-green-200 p-3 text-sm text-green-700">
      ✔️ Se ha enviado un nuevo enlace de verificación a tu correo.
    </div>
  @endif

  {{-- Reenviar correo --}}
  <form method="POST" action="{{ route('verification.send') }}" class="mt-6">
    @csrf

    <button
      type="submit"
      class="w-full rounded-lg bg-[#1E3A8A] px-5 py-3
             text-sm font-semibold text-white
             hover:bg-[#162c6e] transition">
      Reenviar correo de verificación
    </button>
  </form>

  {{-- Cerrar sesión --}}
  <form method="POST" action="{{ route('logout') }}" class="mt-4">
    @csrf

    <button
      type="submit"
      class="w-full rounded-lg border border-gray-300 px-5 py-3
             text-sm font-semibold text-gray-700
             hover:bg-gray-100 transition">
      Cerrar sesión
    </button>
  </form>

</div>

@endsection
