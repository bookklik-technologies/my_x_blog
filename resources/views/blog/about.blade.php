@extends('layouts.app')

@section('content')
    <!--Start Hero Section-->
    <section class="relative">
        <div class="w-full h-full grid grid-rows-5 absolute top-0 left-0" style="z-index: -10">
            <div class="row-span-4 xb-bg-accent lg:rounded-lg"
                style="
              background-image: url('{{ $configs->firstWhere('key', 'header_image') ? url('storage/' . $configs->firstWhere('key', 'header_image')->value) : null }}');
              background-size: cover;
              background-position: center;
            ">
            </div>
        </div>
        <div class="pt-32 lg:pt-16 px-6 lg:px-16">
            <div class="max-w-screen-lg mx-auto flex flex-col items-center text-white">
                <h1 class="text-4xl lg:text-7xl font-bold text-center mb-4">
                    {{ $configs->firstWhere('key', 'name') ? $configs->firstWhere('key', 'name')->value : 'My_x_Blog' }}
                </h1>
                <p class="text-xl lg:text-4xl mb-8 lg:mb-16 text-center font-semibold">
                    {{ $configs->firstWhere('key', 'header') ? $configs->firstWhere('key', 'header')->value : 'My_x_Header' }}
                </p>
                <img src="{{ $configs->firstWhere('key', 'about_image') ? url('storage/' . $configs->firstWhere('key', 'about_image')->value) : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80' }}"
                    class="w-full rounded-lg" />
            </div>
        </div>
    </section>
    <!--End Hero Section-->

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
