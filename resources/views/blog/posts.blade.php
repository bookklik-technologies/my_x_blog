@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="w-full h-28 lg:h-0"></div>

    <section class="px-6 lg:px-16">

        @include('blog.sections.post-list')

    </section>

    <!-- Pagination -->
    <div class="flex items-center justify-center">
        {{ $posts->links() }}
    </div>

    <div class="w-full h-8 lg:h-16"></div>

@endsection
