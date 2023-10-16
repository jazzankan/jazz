<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tips') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <p class="mb-4"><a class="btn-blue" href="/tips/create">Skapa tips</a></p>
            <ul class="mt-10">
                @foreach($tips as $tip)
                    <li draggable="true"><a href="/tips/{{ $tip->id }}/edit" class="text-blue-800">{{ $tip->headline }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
