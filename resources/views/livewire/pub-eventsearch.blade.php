<div class="text-center">
   <p><span class="mr-2">Filtrera på:</span>
   <select wire:model="places" class="form-select form-select-sm appearance-none px-1 py-1 pr-6 text-sm border border-solid border-gray-300 rounded m-0 mb-1">
        <option value="">--- Ort ---</option>
        @foreach($places as $p)
            <option value="{{ $p->id }}">{{ $p->municipality }}</option>
        @endforeach
    </select>
    <select class="form-select form-select-sm appearance-none px-1 py-1 pr-6 text-sm border border-solid border-gray-300 rounded m-0 mb-1">
        <option value="">---Organisatör---</option>
        @foreach($organizers as $o)
            <option value="{{ $o->id }}">{{ $o->orgname }}</option>
        @endforeach
    </select></p>
    <p class="mb-1"><span class="mr-6">Sök på:</span> <input type="text"
                      autocomplete="off"
                      onclick="this.value=''"
                      class="appearance-none text-sm w-1/2 mt-2 mb-0 px-2 py-1 border rounded-lg text-gray-700 border border-solid border-gray-300 focus:outline-none focus:border-green-500"
                      value="" name="search" placeholder="Konsertnamn, artister..." wire:model="query" wire:click="emptyquery"/></p>
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
