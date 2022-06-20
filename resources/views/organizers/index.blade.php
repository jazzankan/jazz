<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inlagda arrangörer') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <p class="mb-4"><a class="btn-blue" href="/organizers/create">Skapa arrangör</a><a class="btn-blue ml-4" href="/events/create">Skapa konsert</a></p>
            <ul>
                @foreach($organizers as $org)
                    <li class="mt-2"><a href="/organizers/{{ $org->id }}/edit" @if($org == App\Models\Organizer::latest()->first())class="text-green-800 font-bold"@else class=" text-blue-800 font-bold"@endif>{{ $org->orgname }}</a> @if($org->comment) <span class="text-sm"> |Kommentar: {{ $org->comment }}</span>@endif @if($org->note) <span class="text-sm"> |Anteckning: {{ $org->note }}</span>@endif<br>
                    @if($org->orglink)<span class="text-sm">Länk: </span><a target="_blank" href="{{ $org->orglink }}" class="text-blue-800 text-sm">{{ $org->orglink }}</a>@endif</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
