@extends('layouts.app')

@section('title', 'Post')

@php
    $theme_color = $configs->firstWhere('key', 'theme_color') ? $configs->firstWhere('key', 'theme_color')->value : '#000000';
@endphp

@section('content')
    <div class="w-full h-28 lg:h-0"></div>

    <style>
        .xb-post-body * {
            margin-bottom: 1.25em;
        }

        .xb-post-body h1 {
            font-size: 2.5em;
            font-weight: 700;
            margin-bottom: 1.25em;
        }

        .xb-post-body h2 {
            font-size: 2em;
            font-weight: 700;
            margin-bottom: 1.25em;
        }

        .xb-post-body h3 {
            font-size: 1.5em;
            font-weight: 700;
            margin-bottom: 1.25em;
        }

        .xb-post-body h4 {
            font-size: 1.25em;
            font-weight: 700;
            margin-bottom: 1.25em;
        }

        .xb-post-body h5 {
            font-size: 1em;
            font-weight: 700;
            margin-bottom: 1.25em;
        }

        .xb-post-body h6 {
            font-size: .75em;
            font-weight: 700;
            margin-bottom: 1.25em;
        }

        .xb-post-body p {
            font-size: 1em;
            font-weight: 400;
            margin-bottom: 1.25em;
        }

        .xb-post-body blockquote {
            font-size: 1em;
            font-weight: 400;
            margin-bottom: 1.25em;
            padding: 1em;
            background: #f5f5f5;
        }

        .xb-post-body ul {
            font-size: 1em;
            font-weight: 400;
            margin-bottom: 1.25em;
            padding-left: 1em;
        }

        .xb-post-body ol {
            font-size: 1em;
            font-weight: 400;
            margin-bottom: 1.25em;
            padding-left: 1em;
        }

        .xb-post-body ul li {
            font-size: 1em;
            font-weight: 400;
            margin-bottom: .5em;
        }

        .xb-post-body ol li {
            font-size: 1em;
            font-weight: 400;
            margin-bottom: .5em;
        }

        .xb-post-body a {
            font-size: 1em;
            font-weight: 400;
            margin-bottom: 1.25em;
            color: {{ $theme_color }};
        }

        .xb-post-body a:hover {
            color: {{ $theme_color }};
            opacity: .8;
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
        <div class="rounded-lg relative overflow-hidden mb-4 lg:mb-8 bg-gray-200"
            style="padding-top: 60%;
            @if ($post->featured_image != null || $post->featured_image != '') background-image: url('{{ url('storage/' . $post->featured_image) }}'); @endif
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;">
        </div>
        <div class="flex font-semibold">
            <p class="mb-0"><a href="{{ route('blog.category', $post->category->slug) }}"
                    class="xb-text-accent">{{ $post->category->name }}</a></p>
            <div class="flex-grow"></div>
            <p class="mb-0">{{ $post->created_at->format('d M Y') }}</p>
        </div>
        <h1 class="text-2xl lg:text-6xl capitalize font-bold lg:block my-4">
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
    </section>

    @if ($post->comments_enabled == 1)
        <section class="px-6 lg:px-16">

            <form action="{{ route('blog.comments.submit') }}" method="post"
                class="flex bg-gray-200 p-2 rounded-lg flex-col mb-2">
                <h2 class="font-bold mb-2"><i class="fas fa-comments mr-2"></i>Leave a comment</h2>
                @csrf
                <input type="text" placeholder="Your name"
                    class="w-full h-12 border border-gray-200 px-2 rounded-lg mb-2" name="name" required>
                <textarea name="body" placeholder="Your comment" class="w-full border border-gray-200 px-2 py-2 rounded-lg mb-2"
                    rows="3" required></textarea>
                <input type="hidden" name="table_name" value="posts" required>
                <input type="hidden" name="table_row_id" value="{{ $post->id }}" required>
                <div class="flex justify-end">
                    <button
                        class="xb-bg-accent hover:opacity-80 text-white rounded-lg px-6 flex items-center justify-center h-12 w-full lg:max-w-fit"><i
                            class="fas fa-paper-plane mr-2"></i>Submit</button>
                </div>
            </form>

            @if ($post->comments)
                <div class="grid grid-rows-1 gap-2 bg-gray-200 p-2 rounded-lg">
                    @foreach ($post->comments as $comment)
                        <div class="flex flex-col px-1 w-full">
                            <div class="flex justify-between">
                                <h2 class="font-bold text-sm">{{ $comment->name }}</h2>
                                <p class="text-gray-500 text-sm">{{ $comment->created_at->format('d M Y') }}</p>
                            </div>
                            <div>
                                {{ $comment->body }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </section>
    @endif

@endsection
