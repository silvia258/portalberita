@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="grid gap-8 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <div class="lg:grid lg:gap-8">
                    <div class="space-y-4">
                        <h3 class="text-primary text-xl font-bold">Artikel Populer</h3>
                        <div class="grid gap-8 xl:grid-cols-2">
                            <div>
                                <div class="grid grid-cols-2 gap-4 divide-y divide-primary xl:grid-cols-1">
                                    @foreach ($headlines as $post)
                                        <x-card.post :post="$post" />
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <div class="grid grid-cols-3 gap-4 xl:grid-cols-2">
                                    @foreach ($posts as $post)
                                        <div>
                                            <x-card.post :post="$post" no-description />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="space-y-8">
                    <div class="space-y-2">
                        <h3 class="text-primary text-xl font-bold">
                            Rekomendasi
                        </h3>
                        <div class="grid gap-8">
                            @foreach ($recommended as $post)
                                <x-card.post :post="$post" no-description />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
