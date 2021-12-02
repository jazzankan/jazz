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
                    <li><a href="/places/{{ $place->id }}/edit" @if($place == App\Models\Place::latest()->first())class="text-green-800 font-bold"@else class="text-blue-800"@endif>{{ $place->municipality }}</a> @if($place->note) <span class="text-sm"> |Anteckning: {{ $place->note }}</span>@endif</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
