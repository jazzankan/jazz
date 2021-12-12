<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inlagda konserter') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <p class="mb-4"><a class="btn-blue" href="/events/create">Skapa konsert</a></p>
            <p class="text-xl">{{ $events->count() }} kommande:</p>
            <ul>
                @foreach($events as $event)
                    <li><a class="text-blue-800" href="/events/{{ $event->id }}/edit">{{ $event->name }}</a>, <span class="text-sm italic">{{ $event->organizer->orgname }}</span> @if($event->note)<span class="text-sm text-red-800"> |Anteckning: {{ $event->note }}@endif</span></li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
