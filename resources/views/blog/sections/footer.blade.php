<footer class="flex flex-col lg:flex-row lg:max-w-screen-xl mx-auto pt-4 px-6 lg:px-16 mb-16">
    <div class="flex justify-center">
        <a href="{{ $configs->firstWhere('key', 'link_instagram') ? $configs->firstWhere('key', 'link_instagram')->value : '#' }}"
            class="bg-gray-200 rounded-md flex items-center justify-center w-8 h-8 text-gray-600 text-sm mr-2">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="{{ $configs->firstWhere('key', 'link_twitter') ? $configs->firstWhere('key', 'link_twitter')->value : '#' }}"
            class="bg-gray-200 rounded-md flex items-center justify-center w-8 h-8 text-gray-600 text-sm mr-2">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="{{ $configs->firstWhere('key', 'link_facebook') ? $configs->firstWhere('key', 'link_facebook')->value : '#' }}"
            class="bg-gray-200 rounded-md flex items-center justify-center w-8 h-8 text-gray-600 text-sm mr-2">
            <i class="fab fa-facebook"></i>
        </a>
    </div>
    <div class="flex-grow h-8 flex items-center justify-center lg:justify-end font-semibold">
        {{ $configs->firstWhere('key', 'footer') ? $configs->firstWhere('key', 'footer')->value : 'My_x_Blog 2023' }}
    </div>
    <div class="flex justify-center">
        <a href="#"
            class="flex items-center justify-center w-8 h-8 text-sm lg:ml-4 rounded-md xb-bg-accent text-white">
            <i class="fas fa-arrow-up"></i>
        </a>
    </div>
</footer>
