<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ $configs->firstWhere('key', 'description') ? $configs->firstWhere('key', 'description')->value : null }}">
    <meta name="author" content="{{ $configs->firstWhere('key', 'author') ? $configs->firstWhere('key', 'author')->value : null }}">
    <meta name="keywords" content="{{ $configs->firstWhere('key', 'keywords') ? $configs->firstWhere('key', 'keywords')->value : null }}">

    <!--Open Graph Metatag-->
    <meta property="og:type" content="website" />
    @if (route('blog.post'))
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->description }}">
    <meta property="og:url" content="{{ route('blog.post', $post->slug) }}" />
    <meta property="og:image" content="{{ url('storage/' . $post->featured_image) }}" />
    @else
    <meta property="og:title" content="{{ $configs->firstWhere('key', 'name') ? $configs->firstWhere('key', 'name')->value : config('app.name', 'xBlog') }}" />
    <meta property="og:description" content="{{ $configs->firstWhere('key', 'description') ? $configs->firstWhere('key', 'description')->value : null }}">
    <meta property="og:url" content="{{ Route::current()->getName() }}" />
    <meta property="og:image" content="{{ $configs->firstWhere('key', 'icon_image') ? url('storage/' . $configs->firstWhere('key', 'icon_image')->value) : null }}" />
    @endif
    <meta property="og:image:width" content="256" />
    <meta property="og:image:height" content="256" />

    <title>{{ $configs->firstWhere('key', 'name') ? $configs->firstWhere('key', 'name')->value : config('app.name', 'xBlog') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&family=Oxanium&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            font-family: 'Oxanium', cursive;
        }

        .ss-bg-accent {
            background-color: #007aff;
        }

        .ss-text-accent {
            color: #007aff;
        }

        .ss-border-accent {
            border-color: #007aff;
        }
    </style>
</head>

<body class="antialiased bg-white">
    <!-- Top Bar Nav -->
    <nav class="fixed w-full z-50 p-6">
        <div
            class="p-2 w-full lg:mx-auto lg:max-w-screen-xl rounded-lg flex flex-col lg:flex-row bg-white bg-opacity-80 backdrop-filter backdrop-blur">
            <div class="h-12 flex items-center">
                <a href="{{ route('blog.home') }}">
                    {{-- <img src="https://madewith.senangstart.net/themes/tailwind/images/senangstart_logo_dark.svg"
                    class="h-full" /> --}}
                    <div>My Blog</div>
                </a>
                <div class="flex-grow lg:hidden"></div>
                <div class="w-12 flex items-center justify-center lg:hidden" onclick="open_mobile_nav()">
                    <span id="mobile_nav_icon_close">
                        <i class="fas fa-bars"></i>
                    </span>
                    <span id="mobile_nav_icon_open" class="hidden">
                        <i class="fas fa-times"></i>
                    </span>
                </div>
            </div>
            <div class="flex-grow hidden lg:flex justify-end flex-col lg:flex-row pt-4 lg:pt-0" id="mobile_nav_body">
                <a href="{{ route('blog.posts') }}" class="rounded-lg px-6 flex items-center h-12 -mx-2 lg:mx-0">Latest Posts</a>
                <a href="{{ route('blog.categories') }}" class="rounded-lg px-6 flex items-center h-12 -mx-2 lg:mx-0">Categories</a>
                <a href="{{ route('blog.about') }}"
                    class="bg-gray-800 text-white rounded-lg px-6 flex items-center justify-center mx-4 mb-4 lg:mb-0 lg:mr-0 lg:ml-4 h-12 mt-4 lg:mt-0">About
                    Us</a>
            </div>
        </div>
    </nav>
    <script>
        function open_mobile_nav() {
            $("#mobile_nav_body").slideToggle("hidden");
            $("#mobile_nav_icon_close").toggleClass("hidden");
            $("#mobile_nav_icon_open").toggleClass("hidden");
        }
    </script>

    <!-- Page Content -->
    <main class="lg:max-w-screen-xl mx-auto pt-0 lg:pt-28">
        @yield('content')
    </main>

    <footer class="flex flex-col lg:flex-row lg:max-w-screen-xl mx-auto pt-4 px-6 lg:px-16 mb-16">
        <div class="flex justify-center">
            <a href="#"
                class="bg-gray-200 rounded-md flex items-center justify-center w-8 h-8 text-gray-600 text-sm mr-2">
                <i class="fab fa-google"></i>
            </a>
            <a href="#"
                class="bg-gray-200 rounded-md flex items-center justify-center w-8 h-8 text-gray-600 text-sm mr-2">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="#"
                class="bg-gray-200 rounded-md flex items-center justify-center w-8 h-8 text-gray-600 text-sm mr-2">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#"
                class="bg-gray-200 rounded-md flex items-center justify-center w-8 h-8 text-gray-600 text-sm mr-2">
                <i class="fab fa-facebook"></i>
            </a>
        </div>
        <div class="flex-grow h-8 flex items-center justify-center lg:justify-end font-semibold">
            © 2023 My Blog
        </div>
        <div class="flex justify-center">
            <a href="#" class="flex items-center justify-center w-8 h-8 text-sm lg:ml-4">
                <i class="fas fa-arrow-up"></i>
            </a>
        </div>
    </footer>
</body>

</html>
