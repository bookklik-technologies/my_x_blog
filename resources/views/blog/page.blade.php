@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@section('keywords', $page->keywords)

@section('content')
    <div class="w-full h-28 lg:h-0"></div>

    <style>
        .xb-page-content p {
            margin-bottom: 1.25em;
        }

        .xb-page-contenty pre {
            padding: .75em;
            background: #f5f5f5;
            margin-bottom: 1.25em;
        }

        .xb-page-content .attachment__caption {
            display: none;
        }
    </style>

    <section class="px-6 lg:px-16">
        <div class="flex font-semibold mb-2">
            <p class="mb-0"><a href="{{ route('blog.category', $page->category->slug) }}"
                    class="xb-text-accent">{{ $page->category->name }}</a></p>
            <div class="flex-grow"></div>
            <p class="mb-0">{{ $page->created_at->format('d M Y') }}</p>
        </div>
        <h1 class="text-2xl lg:text-6xl capitalize font-bold lg:block mb-2">
            {{ $page->title }}
        </h1>
        <div class="flex mb-4 lg:mb-8">
            @php
                $keywords = explode(',', $page->keywords);
            @endphp
            @foreach ($keywords as $keyword)
                <a href="#" class="hover:opacity-80">
                    <span class="bg-gray-200 text-sm px-2 py-1 rounded-full mr-2">{{ $keyword }}</span>
                </a>
            @endforeach
        </div>

        <div class="mb-2 lg:mb-4 leading-normal xb-page-content">
            @if (isset($page->content))
                <p>{!! html_entity_decode($page->content) !!}</p>
            @else
                <p>There is no content for this page yet.</p>
            @endif
        </div>
    </section>

@endsection
