@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!--Start Hero Section-->
    <section class="relative">
        <div class="w-full h-full grid grid-rows-5 absolute top-0 left-0" style="z-index: -10">
            <div class="row-span-4 xb-bg-accent lg:rounded-lg"
                style="
          background-image: url('{{ $configs->firstWhere('key', 'header_image') ? url('storage/' . $configs->firstWhere('key', 'header_image')->value) : null }}');
          background-size: cover;
          background-position: center;
        ">
            </div>
        </div>
        <div class="pt-32 lg:pt-16 px-6 lg:px-16">
            <div class="max-w-screen-lg mx-auto flex flex-col items-center text-white">
                <h1 class="text-4xl lg:text-7xl font-bold text-center mb-4">
                    {{ $configs->firstWhere('key', 'name') ? $configs->firstWhere('key', 'name')->value : 'My_x_Blog' }}
                </h1>
                <p class="text-xl lg:text-4xl mb-8 lg:mb-16 text-center font-semibold">
                    {{ $configs->firstWhere('key', 'header') ? $configs->firstWhere('key', 'header')->value : 'My_x_Header' }}
                </p>
                <img src="{{ $configs->firstWhere('key', 'about_image') ? url('storage/' . $configs->firstWhere('key', 'about_image')->value) : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80' }}"
                    class="w-full rounded-lg" />
            </div>
        </div>
    </section>
    <!--End Hero Section-->

    <div class="w-full h-8 lg:h-16"></div>

    <section class="px-6 lg:px-16">
        @foreach ($posts as $post)
            <a href="{{ route('blog.post', $post->slug) }}">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-8 lg:mb-16 hover:opacity-80">
                    <div class="bg-gray-200 rounded-lg relative overflow-hidden" style="padding-top: 60%">
                        <img src="{{ url('storage/' . $post->featured_image) }}" class="w-full absolute top-0">
                    </div>
                    <div class="left-0 w-full lg:p-4 flex flex-col">
                        <h1 class="text-2xl lg:text-5xl font-bold lg:mb-2">{{ $post->title }}</h1>
                        <div class="flex mb-2 lg:mb-6">
                            <p class="mr-4"><i class="fas fa-clock mr-2"></i>{{ $post->created_at->format('d M Y') }}</p>
                            <p><i class="fas fa-layer-group mr-2"></i>{{ $post->category->name }}</p>
                        </div>
                        <p class="">{{ $post->description }}</p>
                    </div>
                </div>
            </a>
        @endforeach

        <div class="flex items-center justify-center">
            <a href="{{ route('blog.posts') }}"
                class="xb-bg-accent hover:opacity-80 text-white rounded-lg px-6 flex items-center justify-center mx-4 h-12">
                See More
            </a>
        </div>
    </section>

    {{-- <div class="w-full h-8 lg:h-16"></div>

    <section class="px-6 lg:px-16">
        <h1 class="font-bold text-2xl leading-7">Up-Coming Webinar</h1>
        <div class="grid lg:grid-cols-3 mt-4 lg:mt-8 gap-4">
            <div>
                <div class="bg-gray-200 rounded-lg p-4 relative"
                    style="padding-top: 60%; background: url('https://images.unsplash.com/photo-1622547748225-3fc4abd2cca0?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1632&amp;q=80');
                    background-size: cover;">
                    <p
                        class="text-xs h-6 px-1 flex items-center border-2 border-black rounded absolute top-4 left-4 font-bold">
                        Latest
                    </p>
                </div>
                <p class="text-sm mb-1 mt-2">Website . October 25, 2021</p>
                <a href="" class="text-lg font-bold hover:underline">
                    Content can be used to explain the glimpse idea or to catch in seconds view..
                </a>
            </div>
            <div>
                <div class="bg-gray-200 rounded-lg p-4 relative"
                    style="padding-top: 60%; background: url('https://images.unsplash.com/photo-1622547748225-3fc4abd2cca0?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1632&amp;q=80');
                    background-size: cover;">
                    <p
                        class="text-xs h-6 px-1 flex items-center border-2 border-black rounded absolute top-4 left-4 font-bold">
                        Latest
                    </p>
                </div>
                <p class="text-sm mb-1 mt-2">Website . October 25, 2021</p>
                <a href="" class="text-lg font-bold hover:underline">
                    Content can be used to explain the glimpse idea or to catch in seconds view..
                </a>
            </div>
            <div>
                <div class="bg-gray-200 rounded-lg p-4 relative"
                    style="padding-top: 60%; background: url('https://images.unsplash.com/photo-1622547748225-3fc4abd2cca0?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1632&amp;q=80');
                    background-size: cover;">
                    <p
                        class="text-xs h-6 px-1 flex items-center border-2 border-black rounded absolute top-4 left-4 font-bold">
                        Latest
                    </p>
                </div>
                <p class="text-sm mb-1 mt-2">Website . October 25, 2021</p>
                <a href="" class="text-lg font-bold hover:underline">
                    Content can be used to explain the glimpse idea or to catch in seconds view..
                </a>
            </div>
        </div>
    </section> --}}

    <div class="w-full h-8 lg:h-16"></div>

@endsection
