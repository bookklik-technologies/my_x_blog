@extends('layouts.app')

@section('content')

    @include('blog.sections.hero')

    <div class="w-full h-8 lg:h-16"></div>

    <section class="px-6 lg:px-16">
        <div class="p-0 lg:px-24 mb-4 lg:mb-16">
            <h1 class="text-2xl lg:text-6xl capitalize font-bold mb-2 lg:mb-6 hidden lg:block">
                About Us
            </h1>
            <div class="leading-normal mb-2 lg:mb-4">
                @php
                    $description = $configs->firstWhere('key', 'about_description') ? true : false;
                @endphp
                <p>
                    @if ($description)
                        {!! html_entity_decode($configs->firstWhere('key', 'about_description')->value) !!}
                    @else
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat.
                    @endif
                </p>
            </div>
        </div>
    </section>
@endsection
