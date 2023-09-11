@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <div class="w-full h-28 lg:h-0"></div>

    <style>
        .xb-post-body p {
            margin-bottom: 1.25em;
        }

        .xb-post-body pre {
            padding: .75em;
            background: #f5f5f5;
            margin-bottom: 1.25em;
        }

        .xb-post-body .attachment__caption {
            display: none;
        }
    </style>

    <section class="px-6 lg:px-16 xb-post-body">
        <div class="p-0 lg:px-24 mb-4 lg:mb-16">
            <div class="bg-gray-200 rounded-lg relative overflow-hidden mb-4 lg:mb-8" style="padding-top: 60%">
                <img src="{{ url('storage/' . $post->featured_image) }}" class="w-full absolute top-0">
            </div>
            <h1 class="text-2xl lg:text-6xl capitalize font-bold mb-2 lg:block">
                {{ $post->title }}
            </h1>
            <div class="flex text-lg font-semibold mb-2 lg:mb-6">
                <p>{{ $post->created_at->format('d M Y') }}</p>
                <div class="flex-grow"></div>
                <p><a href="{{ route('blog.category', $post->category->slug) }}" class="xb-text-accent">{{ $post->category->name }}</a></p>
            </div>
            <div class="mb-2 lg:mb-4 leading-normal">
                <p>{!! html_entity_decode($post->body) !!}</p>
            </div>
        </div>
    </section>

@endsection
