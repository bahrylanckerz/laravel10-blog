<?php
use \App\Models\TextWidget;
?>

<aside class="w-full md:w-1/3 flex flex-col items-center px-3">

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">
            {{ TextWidget::get('about-us-sidebar')->title }}
        </p>
        <p class="pb-2">
            {{ TextWidget::get('about-us-sidebar')->content }}
        </p>
        <a href="{{ route('about') }}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
            Get to know us
        </a>
    </div>

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">
            Popular Posts
        </p>
        <div class="flex flex-col gap-4">
            @foreach ($posts as $post)
                <div class="grid grid-cols-3 gap-2">
                    <a href="{{ route('view', $post) }}"><img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}"></a>
                    <div class="col-span-2">
                        <a href="{{ route('view', $post) }}"><h2 class="text-bold text-lg">{{ $post->title }}</h2></a>
                        <p class="text-sm">{{ strip_tags($post->shortBody(10)) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">
            All Category
        </p>
        <div class="flex gap-4">
            @foreach ($categories as $category)
                <a href="{{ route('by-category', $category) }}" class="text-semibold py-2 px-3 rounded {{ request('category')?->slug === $category->slug ? 'bg-blue-600 text-white' : '' }}">
                    {{ $category->title." ($category->total)" }}
                </a>
            @endforeach
        </div>
    </div>

</aside>