@extends('layouts.app')

@section('content')
    <!--Start Hero Section-->
    <section class="relative">
        <div class="w-full h-full grid grid-rows-5 absolute top-0 left-0" style="z-index: -10">
            <div class="row-span-4 bg-gray-200 lg:rounded-lg"
                style="
              background-image: url('https://images.unsplash.com/photo-1651647232601-fbea5b6cca0d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2127&q=80');
              background-size: cover;
              background-position: center;
            ">
            </div>
        </div>
        <div class="pt-32 lg:pt-16 px-6 lg:px-16">
            <div class="max-w-screen-lg mx-auto flex flex-col items-center text-white">
                <p class="text-sm lg:text-lg text-center font-semibold mb-2">
                    About Us
                </p>
                <h1 class="text-4xl lg:text-7xl font-bold text-center mb-4">
                    This is My Blog
                </h1>
                <p class="text-xl lg:text-4xl mb-8 lg:mb-16 text-center font-semibold">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <img src="https://images.unsplash.com/photo-1612287230202-1ff1d85d1bdf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1742&q=80"
                    class="w-full rounded-lg" />
            </div>
        </div>
    </section>
    <!--End Hero Section-->
@endsection
