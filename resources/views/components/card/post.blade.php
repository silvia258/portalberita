@props(['post', 'noDescription' => false])

<a href="{{ route('posts.show', $post) }}" class="grid cursor-pointer gap-4 pb-4">
    <div class="aspect-video overflow-hidden rounded-md">
        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}"
            class="hidden aspect-video object-cover transition duration-300 hover:scale-110"
            onload="this.classList.remove('hidden');this.nextElementSibling.classList.add('hidden')">
        <div class="aspect-video animate-pulse bg-gray-200">
        </div>
    </div>
    <div class="space-y-1.5">
        @if ($noDescription)
            <h4 class="text-sm font-bold line-clamp-2">{{ $post->title }}</h4>
        @else
            <h4 class="font-bold">{{ $post->title }}</h4>
            <p class="line-clamp-2 text-sm text-gray-500">
                {{ $post->content }}
            </p>
        @endif
    </div>
</a>
