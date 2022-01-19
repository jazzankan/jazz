<div>
    <input type="text"
           onclick="this.value=''"
           class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
           value="" name="artistselect" placeholder="Sök konsert..." wire:model="query"/>
    @if(strlen($query)>2)
        <p>Träffar:</p>
        <ul>
            @if(count($events)> 0)
                @foreach($events as $event)
                    <li><a class="text-blue-800" href="/events/{{ $event->id }}/edit">{{ $event->name }}</a>, <span class="text-sm italic">{{ $event->organizer->orgname }}</span><span class="text-sm">, {{ $event->day }}</span> @if($event->note)<span class="text-sm text-red-800"> |Anteckning: {{ $event->note }}@endif</span></li>
                @endforeach
            @else
                <li class="text-red-800 font-bold">Ingen träff!</li>
            @endif
            @endif
        </ul>
</div>
