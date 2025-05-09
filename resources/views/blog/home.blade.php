@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @php
        $home_hero = $configs->firstWhere('key', 'home_hero') ? $configs->firstWhere('key', 'home_hero')->value : null;
    @endphp

    @if ($home_hero == 'true')
        @include('blog.sections.hero')
        <div class="w-full h-8 lg:h-16"></div>
    @else
        <div class="w-full h-28 lg:h-0"></div>
    @endif

    <section class="px-6 lg:px-16">

        @include('blog.sections.searchbar')

    </section>

    <div class="w-full h-8 lg:h-16"></div>

    <section class="px-6 lg:px-16">

        @include('blog.sections.post-list')

        <div class="flex items-center justify-center">
            <a href="{{ route('blog.posts') }}"
                class="xb-bg-accent hover:opacity-80 text-white rounded-lg px-6 flex items-center justify-center mx-4 h-12">
                See More
            </a>
        </div>
    </section>

    <div class="w-full h-8 lg:h-16"></div>

    {{-- <section class="px-6 lg:px-16">
        <h1 class="font-bold text-2xl leading-7">Up-Coming Webinar</h1>
        <div class="grid lg:grid-cols-3 mt-4 lg:mt-8 gap-4">
            <div>
                <div class="bg-gray-200 rounded-lg p-4 relative"
                    style="padding-top: 100%; background: url('https://images.unsplash.com/photo-1622547748225-3fc4abd2cca0?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1632&amp;q=80');
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
    </section>

    <div class="w-full h-8 lg:h-16"></div> --}}

@endsection
