<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Redigera arrangör') }}
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
                                <option value ="{{ $organizer->place_id }}">{{ $organizer->place->municipality }}</option>
                                @foreach($places as $p)
                                    <option value ="{{ $p->id }}">{{ $p->municipality }}</option>
                                @endforeach
                            </select>
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
                            <label for="note">Bevakningsintervall - dagar.<br>
                            Använd 0 för ingen bevakning:
                            </label><br>
                            <input type="text"
                                   maxlength="3"
                                   class="w-16 mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   @if($organizer->spiderdata != null)value="{{ $organizer->spiderdata->dayinterval }}" @endif name="interval"/>
                        </div>
                        <div>
                        <input type="checkbox" class="custom-control-input" id="delete" name="delete" value="delete"> Ta bort arrangören.
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
