<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  
  <meta name="application-name" content="{{ config('app.name') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $metaTitle ?? "Live" }}</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
  
  <!-- Styles / Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  <style>
      [x-cloak] {
          display: none !important;
      }
  </style>
  
  @filamentStyles
  @vite('resources/css/app.css')
</head>
<body class="antialiased grid min-h-dvh grid-rows[auto 1fr auto]">
<div class="bg-gray-800 pb-32">
  <x-navigation/>
  <header class="py-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-white">{{ $headerText ?? "Liveware"}}</h1>
    </div>
  </header>
</div>
<main class="-mt-32">
  <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
    <div class="rounded-lg bg-white py-6 shadow sm:px-6 ">
      {{ $slot }}
    </div>
  </div>
</main>
<x-footer/>
@filamentScripts
@vite('resources/js/app.js')

</body>
</html>