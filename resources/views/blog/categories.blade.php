@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="w-full h-28 lg:h-0"></div>

    <section class="px-6 lg:px-16 flex flex-col items-center">
        <h1 class="text-2xl lg:text-5xl font-bold lg:mb-8 mb-4">Categories</h1>
        <div class="flex justify-center">
        @foreach ($categories as $category)
            <a href="{{ route('blog.category', $category->slug) }}"
                class="bg-gray-800 text-white rounded-lg px-6 flex items-center justify-center mx-4 mb-4 h-12">
                {{ $category->name }}
            </a>
        @endforeach
        </div>
    </section>

    <div class="w-full h-8 lg:h-16"></div>

@endsection
