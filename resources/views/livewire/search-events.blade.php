<div>
    <input type="text"
           autocomplete="off"
           onclick="this.value=''"
           class="max-w-lg w-full mt-2 mb-0 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
           value="" name="search" placeholder="Sök konsert..." wire:model.live="query" wire:click="emptyquery"/><br>
    <input type="checkbox" class="custom-control-input" id="coming" name="coming" value="coming" checked="checked" wire:click="togglecoming"> <span class="text-sm">Sök endast kommande.</span>
    @if(strlen($query)>2)
        <p class="py-0 mt-6">Träffar:</p>
        <ul>
            @if(count($events)> 0)
                @foreach($events as $event)
                    <li><a class="text-blue-800" href="/events/{{ $event->id }}/edit">{{ $event->name }}</a>, <span class="text-sm italic">{{ $event->organizer->orgname }}</span>, <span class="text-sm italic">{{ $event->place->municipality }}</span><span class="text-sm">, {{ $event->day }}</span>, <span class="text-blue-800 text-sm"><a href="{{ $event->link }}" target="_blank">Mer info</a></span> @if($event->note)<span class="text-sm text-red-800"> |Anteckning: {{ $event->note }}@endif</span></li>
                @endforeach
            @else
                <li class="text-red-800 font-bold">Ingen träff!</li>
            @endif
            <hr>
            @endif
        </ul>
</div>
