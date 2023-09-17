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

    @if ($post->comments_enabled == 1)
        <section class="px-6 lg:px-16">
            <div class="p-0 lg:px-24 mb-4 lg:mb-16">

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

            </div>
        </section>
    @endif

@endsection
