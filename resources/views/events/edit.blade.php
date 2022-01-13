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
                                <option value="{{ $event->place_id }}">{{ $event->place->municipality }}</option>
                                @foreach($places as $p)
                                    <option value="{{ $p->id }}">{{ $p->municipality }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="organizer_id">Organisatör:</label><br>
                            <select class="border mb-6" name="organizer_id">
                                <option value="{{ $event->organizer_id }}">{{ $event->organizer->orgname }}</option>
                                @foreach($organizers as $o)
                                    <option value="{{ $o->id }}">{{ $o->orgname }}</option>
                                @endforeach
                            </select>
                        </div>
                        @livewire('select-artists', ['selectedartistnames' => $selectedartistnames])
                        <div>
                            <div class="mt-3"><label for="day">Datum:</label><br>
                                <input type="date" class="border rounded-lg mb-6"
                                       value="{{ $event->day }}" name="day">
                            </div>
                            <div>
                                <label for="timeofday">Klockslag:</label><br>
                                <input type="text"
                                       class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                       value="{{ $event->timeofday }}" name="timeofday"/>
                            </div>
                            <div>
                                <label for="comment">Kommentar:</label><br>
                                <input type="text"
                                       class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                       value="{{ $event->comment }}" name="comment"/>
                            </div>
                            <div>
                                <label for="link">Länk till info:</label><br>
                                <input type="text"
                                       class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                       value="{{ $event->link }}" name="link"/>
                            </div>
                            <div>
                                <label for="note">Intern anteckning:</label><br>
                                <input type="text"
                                       class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                       value="{{ $event->note }}" name="note"/>
                            </div>
                            <button type="submit" class="btn-blue">Uppdatera</button>
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
