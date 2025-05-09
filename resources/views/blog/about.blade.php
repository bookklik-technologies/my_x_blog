@extends('layouts.app')

@php
    $theme_color = $configs->firstWhere('key', 'theme_color') ? $configs->firstWhere('key', 'theme_color')->value : '#000000';
@endphp

@section('content')
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

    @include('blog.sections.hero')

    <div class="w-full h-8 lg:h-16"></div>

    <section class="px-6 lg:px-16">
        <div class="p-0 lg:px-24 mb-4 lg:mb-16">
            @php
                $description = $configs->firstWhere('key', 'about_description') ? true : false;
            @endphp
            <div class="xb-post-body">
                @if ($description)
                    {!! html_entity_decode($configs->firstWhere('key', 'about_description')->value) !!}
                @else
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                @endif
            </div>
        </div>
    </section>

@endsection
