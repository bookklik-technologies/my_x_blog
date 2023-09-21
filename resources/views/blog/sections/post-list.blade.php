@foreach ($posts as $post)
    <a href="{{ route('blog.post', $post->slug) }}">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-8 lg:mb-16 hover:opacity-80">
            <div class="bg-gray-200 rounded-lg relative overflow-hidden"
                style="padding-top: 60%;
                    @if ($post->featured_image != null || $post->featured_image != '') background-image: url('{{ url('storage/' . $post->featured_image) }}'); @endif
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;">
            </div>
            <div class="left-0 w-full lg:p-4 flex flex-col">
                <div class="flex text-sm">
                    <p class="mr-4"><i class="fas fa-clock mr-2"></i>{{ $post->created_at->format('d M Y') }}</p>
                    <p><i class="fas fa-layer-group mr-2"></i>{{ $post->category->name }}</p>
                </div>
                <h1 class="text-2xl lg:text-5xl font-bold lg:my-2">{{ $post->title }}</h1>
                <div class="mb-2 lg:mb-6">
                    @php
                        $keywords = explode(',', $post->keywords);
                    @endphp
                    @foreach ($keywords as $keyword)
                        {{ $keyword }},
                    @endforeach
                </div>
                <p>{{ $post->description }}</p>
            </div>
        </div>
    </a>
@endforeach
