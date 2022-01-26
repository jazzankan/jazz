<x-guest-layout>
    <div class="bg-blue-100 rounded-lg max-w-screen-xl m-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 md:gap-3">
            <div class="m-2.5 md:border-r md:border-red-700 md:col-span-3">
                <h1 class="mv-2 text-3xl text-center">Länkar</h1>
            </div>
            <div class="m-2.5 md:col-span-6">
                <h1 class="mv-2 mb-4 text-3xl text-center">Evenemang</h1>
                @livewire('pub-eventsearch')
                <div class="bg-white rounded-lg">
                <ul>
                    @foreach ($events as $event)
                        <li class="events pl-2 py-2.5"><b>{{ $event->name }}</b><br>
                        Ort: {{ $event->place->municipality }}<br>
                        Org: {{ $event->organizer->orgname }}<br>
                        Tid: <b>{{ $event->day }}</b> @if($event->timeofday) , klockan: {{ $event->timeofday }}@endif<br>
                            @if($event->comment){{ $event->comment }}<br>@endif
                            @if($event->link)
                        <a target="_blank" class="text-blue-800 underline hover:bg-red-200" href="{{ $event->link }}">Mer info</a>@endif</li>
                    @endforeach
                </ul>
                    <p>
                        {{$events->render()}}
                    </p>
                </div>
        </div>
        <div class="m-2.5 md:border-l md:border-red-700 md:col-span-3">
            <h1 class=" mv-2 text-3xl text-center">Meddelanden</h1>
        </div>
    </div>
    </div>
</x-guest-layout>
