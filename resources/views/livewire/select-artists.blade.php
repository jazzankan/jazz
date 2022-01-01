<div>
    <label for="artists">Koppla artister:</label><br>
    <input type="text"
           class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
           value="$this->selectedartists" name="name" placeholder="Sök artist..." wire:model="query"/>
    <div x-data="{ names:[] }">
    <p>Förslag:</p>
    @if(strlen($query)>2)
        <ul>
            @if(count($artists)> 0)
                @foreach($artists as $artist)
                    <li><a x-on:click="names.push('{{ $artist->name }}')"  href="#" id="{{ $artist->id }}" class="text-blue-800">{{ $artist->name }}</a></li>
                @endforeach
            @else
                <li class="text-red-800 font-bold">Ingen träff!</li>
            @endif
            @endif
        </ul>
        <p>Tillagda artister:<br>
            <ul>
            <template x-for="name in names">
                <li x-text="name"></li>
            </template>
            </ul>
        </p>
            <p>@php print_r($selectedartists)@endphp</p>
    </div>
</div>
