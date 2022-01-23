<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inlagda konserter') }}
        </h2>
    </x-slot>
    <div class="py-12 ml-2">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <p class="mb-4"><a class="btn-blue" href="/events/create">Skapa konsert</a><a class="btn-blue ml-4" href="/" target="_blank">Publik vy</a></p>
        <div>
        @livewire('search-events')
        </div>
            <p class="text-xl mt-6">Alla {{ $events->count() }} kommande:</p>
            <ul>
                @foreach($events as $event)
                    <li><a @if($event == App\Models\Event::latest()->first())class="text-green-800 font-bold"@else class="text-blue-800"@endif href="/events/{{ $event->id }}/edit">{{ $event->name }}</a>, <span class="text-sm italic">{{ $event->organizer->orgname }}</span>, <span class="text-sm italic">{{ $event->place->municipality }}</span><span class="text-sm">, {{ $event->day }}</span> @if($event->note)<span class="text-sm text-red-800"> |Anteckning: {{ $event->note }}@endif</span></li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
