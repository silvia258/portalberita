@extends('layouts.app')

@section('content')
    <div class="max-w-screen-md mx-auto p-4">
        <div class="grid gap-8">
            <div class="text-center space-y-4">
                <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
                <div>
                    {{ $post->author }} -
                    <span class="text-primary"> Rekap.com </span>
                </div>
                <div class="text-gray-500">
                    {{ $post->created_at->timezone('Asia/Jakarta')->format('D, d M Y H:i T') }}
                </div>
            </div>
            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="rounded-xl aspect-video">
            <div>
                <div class="prose max-w-none">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
