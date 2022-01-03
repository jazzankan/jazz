<div>
    <label for="artists">Koppla artister:</label><br>
    <div x-data="{ names:[],selectedartists:[],open:true }">
    <input type="text"
           x-on:click="open=true"
           onfocus="this.value=''"
           class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
           value="" name="name" placeholder="Sök artist..." wire:model="query"/>

    <p>Förslag:</p>
    @if(strlen($query)>2)
        <ul>
            @if(count($artists)> 0)
                @foreach($artists as $artist)
                    <li x-show="open" x-on:click="open=false"><a x-on:click="names.push('{{ $artist->name }}');selectedartists.push('{{ $artist->id }}')"  href="#" id="{{ $artist->id }}" class="text-blue-800">{{ $artist->name }}</a></li>
                @endforeach
            @else
                <li class="text-red-800 font-bold">Ingen träff!</li>
            @endif
            @endif
        </ul>
        <p>Tillagda artister:<br>
            <ul>
            <template x-for="name in names">
                <li class="text-green-800" x-text="name"></li>
            </template>
            </ul>
        </p>
            <input type="hidden" name="selectedartists[]" x-model="selectedartists" />
    </div>
</div>
