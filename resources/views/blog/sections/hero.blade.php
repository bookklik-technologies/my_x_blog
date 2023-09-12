<!--Start Hero Section-->
<section class="relative">
    <div class="w-full h-full grid grid-rows-5 absolute top-0 left-0" style="z-index: -10">
        @php
            $hero_bg_image = $configs->firstWhere('key', 'hero_bg_image') ? url('storage/' . $configs->firstWhere('key', 'hero_bg_image')->value) : null;
            $hero_bg_image = ($hero_bg_image == null || $hero_bg_image == url('storage/')) ? url('image/andrew-kliatskyi-iQUf7gndqXE-unsplash.jpg') : $hero_bg_image;
        @endphp
        <div class="row-span-4 xb-bg-accent lg:rounded-lg"
            style="
                background-image: url('{{ $hero_bg_image }}');
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
            @php
                $hero_image = $configs->firstWhere('key', 'hero_image') ? url('storage/' . $configs->firstWhere('key', 'hero_image')->value) : null;
                $hero_image = ($hero_image == null || $hero_image == url('storage/')) ? url('image/sam-moghadam-khamseh-HYDUXzWSF5I-unsplash.jpg') : $hero_image;
            @endphp
            <img src="{{ $hero_image }}" class="w-full rounded-lg" />
        </div>
    </div>
</section>
<!--End Hero Section-->
