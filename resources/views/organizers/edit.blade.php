<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Redigera organisatör') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="post" action="{{ route('organizers.update',$organizer->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="pl-2">
                        <div>
                            <label for="municipality">Namn:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $organizer->orgname }}" name="orgname"/>
                        </div>
                        <div>
                            <label for="orglink">Länk:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $organizer->orglink }}" name="orglink"/>
                        </div>
                        <div>
                            <label for="place_id">Ort:</label><br>
                            <select class="border mb-6" name="place_id">
                                <option value ="{{ $organizer->place_id }}">Välj ort</option>
                                @foreach($places as $p)
                                    <option value ="{{ $p->id }}">{{ $p->municipality }}</option>
                                @endforeach
                            </select>
                            <p class="mt-0 mb-4">Vald ort: {{ $places->where('id',$organizer->place_id)->first()->municipality }}</p>
                        </div>
                        <div>
                            <label for="note">Kommentar:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $organizer->comment }}" name="comment"/>
                        </div>
                        <div>
                            <label for="note">Intern anteckning:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $organizer->note }}" name="note"/>
                        </div>
                        <div>
                        <input type="checkbox" class="custom-control-input" id="delete" name="delete" value="delete"> Ta bort organisatören.
                        </div>
                        <button type="submit" class="btn-blue mt-4">Uppdatera</button>
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