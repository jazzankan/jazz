<div>
    <label for="artists">Koppla artister:</label><br>
    <input type="text"
           class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
           value="" name="name" placeholder="Sök artist..." wire:model="query"/>
            <ul>
            @foreach($artists as $artist)
                <li>{{ $artist->name }}</li>
            </ul>

    <p>Tillagda artister:<br>
        Lundström, Tord
    </p>
</div>
