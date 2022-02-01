<div class="text-center">
    <p><span class="mr-2">Filtrera på:</span>
        <select
            wire:model="query"
            class="form-select form-select-sm appearance-none px-1 py-1 pr-6 text-sm border border-solid border-gray-300 rounded m-0 mb-1">
            <option value="">--- Ort ---</option>
            @foreach($places as $p)
                <option value="{{ $p->municipality }}">{{ $p->municipality }}</option>
            @endforeach
        </select>
        <select
            wire:model="query"
            class="form-select form-select-sm appearance-none px-1 py-1 pr-6 text-sm border border-solid border-gray-300 rounded m-0 mb-1">
            <option value="">---Organisatör---</option>
            @foreach($organizers as $o)
                <option value="{{ $o->orgname }}">{{ $o->orgname }}</option>
            @endforeach
        </select></p>
    <p class="mb-1"><span class="mr-6">Sök på:</span>
        <input type="text"
               autocomplete="off"
               onclick="this.value=''"
               class="appearance-none text-sm w-1/2 mt-2 mb-0 px-2 py-1 border rounded-lg text-gray-700 border border-solid border-gray-300 focus:outline-none focus:border-green-500"
               value="" name="search" placeholder="Konsertnamn, artister..." wire:model="query"
               wire:click="emptyquery"/></p>
    @if(strlen($query)>2)
        <ul class="bg-white rounded-lg text-left">
            @if(count($events)> 0)
                @foreach($events as $event)
                    <li class="events pl-2 py-2.5"><b>{{ $event->name }}</b><br>
                        Ort: {{ $event->place->municipality }}<br>
                        Org: {{ $event->organizer->orgname }}<br>
                        Tid: <b>{{ $event->day }}</b> @if($event->timeofday) , klockan: {{ $event->timeofday }}@endif<br>
                        @if($event->comment){{ $event->comment }}<br>@endif
                        @if($event->link)
                            <a target="_blank" class="text-blue-800 underline hover:bg-red-200" href="{{ $event->link }}">Mer info</a>@endif</li>
                @endforeach
            @else
                <li class="text-red-800 font-bold">Ingen träff!</li>
            @endif
            <hr>
            @endif
        </ul>
</div>
