<form action="{{ route('blog.posts.search') }}" method="post">
    <div class="flex bg-gray-200 p-2 rounded-lg">
        @csrf
        <input type="text" placeholder="Search..." class="w-full h-12 border border-gray-200 px-6 rounded-lg"
            name="search">
        <button class="border border-gray-200 hover:opacity-80 rounded-lg px-6 flex items-center justify-center ml-2"
            type="submit">
            <i class="fas fa-search"></i>
        </button>
    </div>
    @if (isset($keyword))
        <div class="mt-2">
            <span class="text-gray-500">Search result for: </span>
            <span class="text-gray-700 font-bold">{{ $keyword }}</span>
        </div>
    @endif
</form>
