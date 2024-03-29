<?php
use \App\Models\TextWidget;
?>

<x-app-layout>

    <section class="w-full flex flex-col items-center px-3">

        <article class="w-full flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="/storage/{{ TextWidget::get('about-us-page')->image }}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ TextWidget::get('about-us-page')->title }}</a>
                <div>{!! TextWidget::get('about-us-page')->content !!}</div>
            </div>
        </article>

    </section>

</x-app-layout>