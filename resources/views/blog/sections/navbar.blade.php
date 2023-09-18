<!-- Top Bar Nav -->
<nav class="fixed w-full z-50 p-6">
    <div
        class="p-2 w-full lg:mx-auto lg:max-w-screen-xl rounded-lg flex flex-col lg:flex-row bg-white bg-opacity-80 backdrop-filter backdrop-blur">
        <div class="h-12 flex items-center">
            <a href="{{ route('blog.home') }}">
                @php
                    $logo_image = $configs->firstWhere('key', 'logo_image') ? url('storage/' . $configs->firstWhere('key', 'logo_image')->value) : null;
                    $logo_image = ($logo_image == null || $logo_image == url('storage/')) ? url('image/my_x_blog_logo.png') : $logo_image;
                @endphp
                @if ($logo_image)
                    <img src="{{ $logo_image }}" class="h-12" />
                @else
                    <div>
                        {{ $configs->firstWhere('key', 'name') ? $configs->firstWhere('key', 'name')->value : config('app.name', 'My_x_Blog') }}
                    </div>
                @endif
            </a>
            <div class="flex-grow lg:hidden"></div>
            <div class="w-12 flex items-center justify-center lg:hidden" onclick="open_mobile_nav()">
                <span id="mobile_nav_icon_close">
                    <i class="fas fa-bars"></i>
                </span>
                <span id="mobile_nav_icon_open" class="hidden">
                    <i class="fas fa-times"></i>
                </span>
            </div>
        </div>
        <div class="flex-grow hidden lg:flex justify-end flex-col lg:flex-row pt-4 lg:pt-0" id="mobile_nav_body">
            <a href="{{ route('blog.posts') }}" class="rounded-lg px-6 flex items-center h-12 -mx-2 lg:mx-0">All
                Posts</a>
            <a href="{{ route('blog.categories') }}"
                class="rounded-lg px-6 flex items-center h-12 -mx-2 lg:mx-0">Categories</a>
            <a href="{{ route('blog.about') }}"
                class="xb-bg-accent hover:opacity-80 text-white rounded-lg px-6 flex items-center justify-center mx-4 mb-4 lg:mb-0 lg:mr-0 lg:ml-4 h-12 mt-4 lg:mt-0">About
                Us</a>
        </div>
    </div>
</nav>
<script>
    function open_mobile_nav() {
        $("#mobile_nav_body").slideToggle("hidden");
        $("#mobile_nav_icon_close").toggleClass("hidden");
        $("#mobile_nav_icon_open").toggleClass("hidden");
    }
</script>
