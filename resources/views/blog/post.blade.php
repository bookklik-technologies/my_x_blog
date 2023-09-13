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

    <section class="px-6 lg:px-16">
        <div class="p-0 lg:px-24 mb-4 lg:mb-16">
            <div class="bg-gray-200 rounded-lg relative overflow-hidden mb-4 lg:mb-8" style="padding-top: 60%">
                @if ($post->featured_image != null || $post->featured_image != '')
                    <img src="{{ url('storage/' . $post->featured_image) }}" class="w-full absolute top-0">
                @endif
            </div>
            <div class="flex font-semibold mb-2">
                <p class="mb-0"><a href="{{ route('blog.category', $post->category->slug) }}"
                        class="xb-text-accent">{{ $post->category->name }}</a></p>
                <div class="flex-grow"></div>
                <p class="mb-0">{{ $post->created_at->format('d M Y') }}</p>
            </div>
            <h1 class="text-2xl lg:text-6xl capitalize font-bold lg:block">
                {{ $post->title }}
            </h1>
            <div class="flex mb-2 lg:mb-6">
                @php
                    $keywords = explode(',', $post->keywords);
                @endphp
                @foreach ($keywords as $keyword)
                    <a href="{{ route('blog.keyword', $keyword) }}" class="hover:opacity-80">
                        <span class="bg-gray-200 text-sm px-2 py-1 rounded-full mr-2">{{ $keyword }}</span>
                    </a>
                @endforeach
            </div>
            <div class="mb-2 lg:mb-4 leading-normal xb-post-body">
                @if (isset($post->body))
                    <p>{!! html_entity_decode($post->body) !!}</p>
                @else
                    <p>There is no content for this post yet.</p>
                @endif
            </div>
        </div>
    </section>

@endsection
