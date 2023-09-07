@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="w-full h-28 lg:h-0"></div>

    <section class="px-6 lg:px-16">
        <h1 class="text-2xl lg:text-5xl font-bold lg:mb-8 mb-4 text-center">Categories</h1>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($categories as $category)
                <a href="{{ route('blog.category', $category->slug) }}">
                    <div class="rounded-lg relative overflow-hidden hover:opacity-80 xb-bg-accent" style="padding-top: 60%;">
                        <div class="absolute bottom-0 left-0 w-full p-4 overflow-hidden">
                            <p class="text-base lg:text-2xl font-semibold text-white">
                                {{ $category->name }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <div class="w-full h-8 lg:h-16"></div>

@endsection
