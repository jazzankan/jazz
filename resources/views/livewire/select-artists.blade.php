<div>
    <label for="artists">Koppla artister:</label><br>
    <div x-data="{ names:[{{ old('artistnames') }}],selectedartists:[],open:true }">
    <input type="text"
           x-on:keyup="open=true"
           onfocus="this.value=''"
           class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
           value="" name="artistselect" placeholder="Sök artist..." wire:model="query"/>

    <p>Förslag:</p>
    @if(strlen($query)>2)
        <ul>
            @if(count($artists)> 0)
                @foreach($artists as $artist)
                    <li x-show="open" x-on:click="open=false"><a x-on:click="names.push('{{ $artist->name }}');selectedartists.push('{{ $artist->id }}')"  href="#" id="{{ $artist->id }}" class="text-blue-800">{{ $artist->name }}</a></li>
                @endforeach
            @else
                <li class="text-red-800 font-bold">Ingen träff! <a class="text-blue-800" href="/artists/create" target="_blank">Skapa artist.</a></li>
            @endif
            @endif
        </ul>
        <p>Tillagda artister:<br>
            <ul>
            <template x-for="name in names">
                <li><span class="text-green-800" x-text="name + '&nbsp;'"></span><a href="#" style="display: inline-block;" class="text-sm text-blue-800" x-on:click="selectedartists.splice(names.indexOf(name),1); names.splice(names.indexOf(name),1) "><img src="https://webbsallad.se/jazzfiler/soptunna-16.png"></a></li>
            </template>
            </ul>
        </p>
            <input type="hidden" name="artistnames" value="{{ old('artistnames') }}" x-model="JSON.stringify(names)" />
            <input type="hidden" name="selectedartists[]"  x-model="selectedartists" />
    </div>
</div>
