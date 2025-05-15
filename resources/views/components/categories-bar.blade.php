@props(['categories'])

<div
    class="border-primary bg-primary/10 border-b-2 border-t-2 text-sm font-medium">
    <div class="container mx-auto flex gap-1 space-x-12 px-4 py-2">
        @foreach ($categories as $category)
            <div class="cursor-pointer hover:text-primary transition">{{ $category->name }}</div>
        @endforeach
    </div>
</div>
