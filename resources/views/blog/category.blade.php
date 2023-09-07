@extends('layouts.app')

@section('title', 'Category')

@section('content')
    <div class="w-full h-28 lg:h-0"></div>

    <section class="px-6 lg:px-16">
        <h1 class="text-2xl lg:text-5xl font-bold lg:mb-2">Category: <span class="xb-text-accent">{{ $category->name }}</span></h1>
        <p class="lg:mb-8 mb-4">{{ $category->description }}</p>

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
    </section>

    <!-- Pagination -->
    <div class="flex items-center justify-center">
        {{ $posts->links() }}
    </div>

    <div class="w-full h-8 lg:h-16"></div>

@endsection
