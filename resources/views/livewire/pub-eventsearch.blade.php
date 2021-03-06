<div class="text-center">
    <p><span class="mr-2">Filtrera på:</span>
        <select
            wire:model="query"
            class="form-select form-select-sm appearance-none px-1 py-1 pr-6 text-sm border border-solid border-gray-300 rounded m-0 mb-1">
            <option value="" name="place">--- Ort ---</option>
            @foreach($places as $p)
                <option value="{{ $p->municipality }}">{{ $p->municipality }}</option>
            @endforeach
        </select>
        <select
            wire:model="query"
            class="form-select form-select-sm appearance-none px-1 py-1 pr-6 text-sm border border-solid border-gray-300 rounded m-0 mb-1">
            <option value="">---Arrangör---</option>
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
               wire:click="newsearch"/></p>
    @if(strlen($query)>2 || $query === "")
        <ul class="bg-white rounded-lg text-left mt-4">
            @if(count($events)> 0)
                @foreach($events as $event)
                    <li class="events pl-2 py-2.5"><b>{{ $event->name }}</b><br>
                        Ort: {{ $event->place->municipality }}<br>
                        Arr: {{ $event->organizer->orgname }}<br>
                        Tid: <span class="bg-indigo-50 px-2 text-red-800"><b>{{ $event->day }}</b></span> @if($event->timeofday)
                            , klockan: {{ $event->timeofday }}
                        @endif<br>
                        @if($event->comment)
                            {{ $event->comment }}>
                        @endif
                        @if($event->link)
                            <a target="_blank" class="text-blue-800 underline hover:bg-red-200"
                               href="{{ $event->link }}">Mer info</a>
                        @endif
                @endforeach
                @if($events->links())
                    {{ $events->links() }}
                @endif
            @else
                <li class="text-red-800 font-bold text-center">Ingen träff!</li>
            @endif
        </ul>
    @endif
</div>
