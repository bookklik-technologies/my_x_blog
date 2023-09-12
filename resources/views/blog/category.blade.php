@extends('layouts.app')

@section('title', 'Category')

@section('content')
    <div class="w-full h-28 lg:h-0"></div>

    <section class="px-6 lg:px-16">
        <h1 class="text-2xl lg:text-5xl font-bold lg:mb-2">Category: <span class="xb-text-accent">{{ $category->name }}</span></h1>
        <p class="lg:mb-8 mb-4">{{ $category->description }}</p>

        @include('blog.sections.post-list')

    </section>

    <!-- Pagination -->
    <div class="flex items-center justify-center">
        {{ $posts->links() }}
    </div>

    <div class="w-full h-8 lg:h-16"></div>

@endsection
