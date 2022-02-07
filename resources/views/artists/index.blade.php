<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artister') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <p class="mb-4"><a class="btn-blue" href="/artists/create">Skapa artist</a><a class="btn-blue ml-4" href="/events/create">Skapa konsert</a></p>
            <div class="mt-6">
                @livewire('search-artists')
            </div>
            <p class="text-lg mt-10">De 10 senast skapade av totalt {{ $totalartists->count() }}:</p>
            <ul>
                @foreach($artists as $a)
                    <li><a href="/artists/{{ $a->id }}/edit" class="text-blue-800">{{ $a->name }}</a>, {{ $a->instrument }} @if($a->note) <span class="text-sm"> |Anteckning: {{ $a->note }}</span>@endif</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
