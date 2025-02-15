<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>LELOBD Dashboard - @yield('title')</title>
    <link rel="icon" type="lelobd/icon" href="{{ asset('/images/lelobd.png') }}" />
    {{-- tag com pany name is lelobd --}}
    <meta name="description" content="LELOBD is a online shopping platform" />
    <meta name="keywords" content="LELOBD, online shopping, shopping, e-commerce" />
    <meta name="author" content="LELOBD" />

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/progress.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" />
    {{-- tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome.css">
</head>

<body>

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





    <script src="{{ asset('js/config.js') }}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </script>
</body>

</html>
