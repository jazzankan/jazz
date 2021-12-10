<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Redigera evenemang') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="post" action="{{ route('events.update',$event->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="pl-2">
                        <div>
                            <label for="name">Namn:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $event->name }}" name="name"/>
                        </div>
                        <div>
                            <label for="place_id">Ort:</label><br>
                            <select class="border mb-6" name="place_id">
                                <option value="{{ $event->place_id }}">Välj ort</option>
                                @foreach($places as $p)
                                    <option value="{{ $p->id }}">{{ $p->municipality }}</option>
                                @endforeach
                            </select>
                            <p class="mt-0 mb-4">@if ( $event->place_id) Vald
                                ort: {{ $places->where('id',$event->place_id)->first()->municipality }}@endif</p>
                        </div>
                        <div>
                            <label for="organizer_id">Ort:</label><br>
                            <select class="border mb-6" name="organizer_id">
                                <option value="{{ $event->organizer_id }}">Välj organisatör</option>
                                @foreach($organizers as $o)
                                    <option value="{{ $o->id }}">{{ $o->orgname }}</option>
                                @endforeach
                            </select>
                            <p class="mt-0 mb-4">@if ( old('organizer_id')) Vald
                                organisatör: {{ $organizers->where('id',old('organizer_id'))->first()->orgname }}@endif</p>
                        </div>
                        <div>
                            <div class="mt-5"><label for="day">Datum:</label><br>
                                <input type="date" class="border rounded-lg mb-6"
                                       value="{{ old('day') != null ? old('day') : ''}}" name="day">
                            </div>
                            <div>
                                <label for="timeofday">Klockslag:</label><br>
                                <input type="text"
                                       class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                       value="{{ old('timeofday') }}" name="timeofday"/>
                            </div>
                            <div>
                                <label for="comment">Kommentar:</label><br>
                                <input type="text"
                                       class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                       value="{{ old('comment') }}" name="comment"/>
                            </div>
                            <div>
                                <label for="link">Länk till info:</label><br>
                                <input type="text"
                                       class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                       value="{{ old('link') }}" name="link"/>
                            </div>
                            <div>
                                <label for="note">Intern anteckning:</label><br>
                                <input type="text"
                                       class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                       value="{{ old('note') }}" name="note"/>
                            </div>
                            <button type="submit" class="btn-blue">Skapa</button>
                        </div>
                </form>
            </div>
            <div>
                <p>
                @if ($errors->any())
                    <div class="text-red-600 bg-pink-200 mt-2 py-4 pl-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    </p>
            </div>
        </div>
    </div>
</x-app-layout>
