<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skapa ny organisatör') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="post" action="{{ route('organizers.store') }}">
                    @csrf
                    <div class="pl-2">
                        <div>
                            <label for="municipality">Namn:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('orgname') }}" name="orgname"/>
                        </div>
                        <div>
                            <label for="orglink">Länk:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('orglink') }}" name="orglink"/>
                        </div>
                        <div>
                            <label for="place_id">Ort:</label><br>
                        <select class="border mb-6" name="place_id">
                            <option value ="{{ old('place_id') }}">Välj ort</option>
                            @foreach($places as $p)
                                <option value ="{{ $p->id }}">{{ $p->municipality }}</option>
                            @endforeach
                        </select>
                            <p class="mt-0 mb-4">@if ( old('place_id')) Vald ort: {{ $places->where('id',old('place_id'))->first()->municipality }}@endif</p>
                        </div>
                        <div>
                            <label for="note">Kommentar:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('comment') }}" name="comment"/>
                        </div>
                        <div>
                            <label for="note">Intern anteckning:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('note') }}" name="note"/>
                        </div>
                        <div>
                            <label for="note">Bevakningsintervall. Dagar:</label><br>
                            <input type="text"
                                   maxlength="3"
                                   class="w-16 mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('interval') }}" name="interval"/>
                        </div>
                        <button type="submit" class="btn-blue">Skapa</button>
                    </div>
                </form>
            </div>
            <div>
                <div>
                @if ($errors->any())
                    <div class="text-red-600 bg-pink-200 mt-2 py-4 pl-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>

