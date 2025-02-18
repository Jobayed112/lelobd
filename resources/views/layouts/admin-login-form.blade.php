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
    <link href="{{ asset('css/progress.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" />
    {{-- tailwindcss --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />



</head>

<body class="overflow-x-hidden">

    {{-- <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div> --}}
    <div id="loader" class="fixed inset-0 flex items-center justify-center bg-white z-50">
        <!-- Spinner using Tailwind utilities -->
        <div class="w-16 h-16 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
      </div>

    <x-toast-message />


    <div id="contentRef" class="  min-h-screen w-full flex items-center justify-center p-2">
        @yield('login')
    </div>



    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <!-- Include SwiperJS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Flowbite JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>


    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </script>



</body>

</html>
