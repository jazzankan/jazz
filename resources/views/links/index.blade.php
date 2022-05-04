<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Länkar') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <p class="mb-4"><a class="btn-blue" href="/links/create">Skapa länk</a></p>
            <ul class="mt-10">
                @foreach($links as $link)
                    <li><a href="/links/{{ $link->id }}/edit" class="text-blue-800">{{ $link->linktext }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
