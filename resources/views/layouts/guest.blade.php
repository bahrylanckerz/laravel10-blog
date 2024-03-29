<x-app-layout>
    <div class="w-full mx-auto">
        <div class="flex flex-col justify-center items-center">
            <div class="w-full max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>