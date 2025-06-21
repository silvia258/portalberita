@props(['categories'])

<div class="border-primary bg-primary/10 border-b-2 border-t-2 text-sm font-medium">
    <div class="container mx-auto flex gap-1 space-x-12 px-4 py-2">
        @foreach ($categories as $category)
            <a href="{{ route('categories.posts', $category) }}" @class([
                'cursor-pointer hover:text-primary transition',
                'text-primary' =>
                    request()->routeIs('categories.*') &&
                    request()->route('category')?->id === $category->id,
            ])>
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>
