<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inlagda orter (kommuner)') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <ul>
                @foreach($places as $place)
                    @if($place == App\Models\Place::latest()->first())
                        <li class="text-green-800 font-bold">{{ $place->municipality }} @if($place->note) <span class="text-sm">Anteckning:{{ $place->note }}</span>@endif</li>
                    @else
                    <li>{{ $place->municipality }} @if($place->note) <span class="text-sm">Anteckning: {{ $place->note }}</span>@endif</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
