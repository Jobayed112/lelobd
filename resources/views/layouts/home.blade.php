<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>LELOBD - @yield('title')</title>
    <link rel="icon" type="lelobd/icon" href="{{ asset('/images/lelobd.png') }}" />
    {{-- tag com pany name is lelobd --}}
    <meta name="description" content="LELOBD is a online shopping platform" />
    <meta name="keywords" content="LELOBD, online shopping, shopping, e-commerce" />
    <meta name="author" content="LELOBD" />

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" />
    {{-- tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/fontawesome.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <!-- Toastify CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<!-- Include SwiperJcss -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="overflow-x-hidden">
    {{-- loader --}}
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <x-toast-message />



    @include('components.home.header')
    @include('components.home.sidebar')


    @yield('content')

    @include('components.home.footer')


    <script src="{{ asset('js/header.js') }}"></script>

    <!-- Include SwiperJS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Flowbite JS CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>


  <!-- Toastify JS -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  </script>
</body>

</html>
