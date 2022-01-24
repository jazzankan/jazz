<div>
    <input type="text"
           autocomplete="off"
           onclick="this.value=''"
           class="max-w-lg w-full mt-2 mb-0 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
           value="" name="artistselect" placeholder="Sök artist..." wire:model="query"/><br>
    @if(strlen($query)>2)
        <p class="py-0 mt-6">Träffar:</p>
        <ul>
            @if(count($artists)> 0)
                @foreach($artists as $a)
                    <li><a href="/artists/{{ $a->id }}/edit" class="text-blue-800">{{ $a->name }}</a>, {{ $a->instrument }} @if($a->note) <span class="text-sm"> |Anteckning: {{ $a->note }}</span>@endif</li>
                @endforeach
            @else
                <li class="text-red-800 font-bold">Ingen träff!</li>
            @endif
            <hr>
            @endif
        </ul>
</div>
