<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author"
        content="{{ $configs->firstWhere('key', 'author') ? $configs->firstWhere('key', 'author')->value : null }}">

    @if (Route::currentRouteName() == 'blog.post')
        <meta name="description" content="{{ $post->description }}">
        <meta name="keywords"
            content="{{ $configs->firstWhere('key', 'keywords') ? $configs->firstWhere('key', 'keywords')->value : null . $post->keywords }}">
        <meta property="og:title" content="{{ $post->title }}" />
        <meta property="og:description" content="{{ $post->description }}">
        <meta property="og:url" content="{{ route('blog.post', $post->slug) }}" />
        <meta property="og:image" content="{{ url('storage/' . $post->featured_image) }}" />
    @else
        <meta name="description"
            content="{{ $configs->firstWhere('key', 'description') ? $configs->firstWhere('key', 'description')->value : null }} @yield('description')">
        <meta name="keywords"
            content="{{ $configs->firstWhere('key', 'keywords') ? $configs->firstWhere('key', 'keywords')->value : null }} @yield('keywords')">
        <meta property="og:title"
            content="{{ $configs->firstWhere('key', 'name') ? $configs->firstWhere('key', 'name')->value : config('app.name', 'xBlog') }}" />
        <meta property="og:description"
            content="{{ $configs->firstWhere('key', 'description') ? $configs->firstWhere('key', 'description')->value : null }}">
        <meta property="og:url" content="{{ url()->full() }}" />
        <meta property="og:image"
            content="{{ $configs->firstWhere('key', 'icon_image') ? url('storage/' . $configs->firstWhere('key', 'icon_image')->value) : null }}" />
    @endif
    <meta property="og:type" content="website" />
    <meta property="og:image:width" content="256" />
    <meta property="og:image:height" content="256" />

    @php
        $icon_image = $configs->firstWhere('key', 'icon_image') ? url('storage/' . $configs->firstWhere('key', 'icon_image')->value) : null;
        $icon_image = $icon_image && !file_exists($icon_image) ? url('image/my_x_blog_icon.svg') : $icon_image;
    @endphp
    <link rel="shortcut icon" href="{{ $icon_image }}" type="image/x-icon">

    <title>
        @hasSection('title')
            @yield('title') |
        @endif
        {{ $configs->firstWhere('key', 'name') ? $configs->firstWhere('key', 'name')->value : config('app.name', 'My_x_Blog') }}
    </title>

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

    @php
        $theme_color = $configs->firstWhere('key', 'theme_color') ? $configs->firstWhere('key', 'theme_color')->value : '#000000';
    @endphp

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="{{ $theme_color }}">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="{{ $theme_color }}">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="{{ $theme_color }}">

    <style>
        * {
            font-family: 'Oxanium', cursive;
        }

        .xb-bg-accent {
            background-color: {{ $theme_color }};
        }

        .xb-text-accent {
            color: {{ $theme_color }};
        }

        .xb-border-accent {
            border-color: {{ $theme_color }};
        }
    </style>
</head>

<body class="antialiased bg-white">

    @include('blog.sections.navbar')

    <!-- Page Content -->
    <main class="lg:max-w-screen-xl mx-auto pt-0 lg:pt-28">
        @yield('content')
    </main>

    @include('blog.sections.footer')

</body>

</html>
