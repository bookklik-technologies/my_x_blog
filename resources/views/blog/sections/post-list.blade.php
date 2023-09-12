@foreach ($posts as $post)
    <a href="{{ route('blog.post', $post->slug) }}">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-8 lg:mb-16 hover:opacity-80">
            <div class="bg-gray-200 rounded-lg relative overflow-hidden" style="padding-top: 60%">
                @if ($post->featured_image != null || $post->featured_image != '')
                    <img src="{{ url('storage/' . $post->featured_image) }}" class="w-full absolute top-0">
                @endif
            </div>
            <div class="left-0 w-full lg:p-4 flex flex-col">
                <h1 class="text-2xl lg:text-5xl font-bold lg:mb-2">{{ $post->title }}</h1>
                <div class="flex mb-2 lg:mb-6">
                    <p class="mr-4"><i class="fas fa-clock mr-2"></i>{{ $post->created_at->format('d M Y') }}</p>
                    <p><i class="fas fa-layer-group mr-2"></i>{{ $post->category->name }}</p>
                </div>
                <p class="">{{ $post->description }}</p>
            </div>
        </div>
    </a>
@endforeach
