@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="w-full h-28 lg:h-0"></div>

    <section class="px-6 lg:px-16">
        @foreach ($posts as $post)
            <a href="{{ route('blog.post', $post->slug) }}">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-8 lg:mb-16 hover:opacity-80">
                    <div class="bg-gray-200 rounded-lg relative overflow-hidden" style="padding-top: 60%">
                        <img src="{{ url('storage/' . $post->featured_image) }}" class="w-full absolute top-0">
                    </div>
                    <div class="left-0 w-full lg:p-4 flex flex-col">
                        <h1 class="text-2xl lg:text-5xl font-bold">{{ $post->title }}</h1>
                        <div class="flex mb-2">
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
                class="bg-blue-600 text-white rounded-lg text-center lg:text-lg px-8 lg:max-w-max py-3 flex items-center justify-center font-semibold w-full">Load
                More</a>
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
