<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skapa nytt evenemang') }}
        </h2>
    </x-slot>
    <div class="py-12 max-w-screen-lg mx-auto sm:px-6 lg:px-8">
        <div x-data="{chosen_place: false, chosen_arr: false, name: '', place_id: '', organizer_id: ''}">
            <form method="post" autocomplete="off" action="{{ route('events.store') }}"
                  onkeydown="return event.key != 'Enter';">
                @csrf
                <div class="pl-2">
                    <label for="name">Namn:</label><br>
                    <input type="text"
                           @if(!old('name'))x-model="name" @endif
                           class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                           value="{{ old('name') }}" name="name"/>@if(!old('name'))
                        <span class="ml-4 btn-small cursor-pointer"
                              x-on:click="name= '{{ $lastevent->name }}'">Senaste</span>
                    @endif
                </div>
                <div>
                    <label for="place_id">Ort:</label><br>
                    <select class="border mb-6" name="place_id">
                        <option value="{{ old('place_id') }}"
                                @if(!old('place_id'))x-model="place_id" @endif>Välj ort
                        </option>
                        @foreach($places as $p)
                            <option value="{{ $p->id }}">{{ $p->municipality }}</option>
                        @endforeach
                    </select>@if(!old('place_id'))
                        <span class="ml-4 btn-small cursor-pointer"
                              x-on:click="place_id={{ $lastevent->place_id }},chosen_place=true">Senaste</span>
                    @endif
                    <div class="text-green-800" x-show="chosen_place">
                        Valt {{ $places->where('id',$lastevent->place_id)->first()->municipality }}.
                    </div>
                    <p class="mt-0 mb-4"> @if (old('place_id'))
                            Vald
                            ort: {{ $places->where('id',old('place_id'))->first()->municipality }}
                    </p> @endif
                </div>
                <div>
                    <label for="organizer_id">Arrangör:</label><br>
                    <select class="border mb-6" name="organizer_id">
                        <option value="{{ old('organizer_id') }}"
                                @if(!old('organizer_id'))x-model="organizer_id" @endif>Välj arrangör
                        </option>
                        @foreach($organizers as $o)
                            <option value="{{ $o->id }}">{{ $o->orgname }}</option>
                        @endforeach
                    </select> @if(!old('organizer_id'))
                        <span class="ml-4 btn-small cursor-pointer"
                              x-on:click="organizer_id = {{ $lastevent->organizer_id }}, chosen_arr=true">Senaste</span>
                    @endif
                    <div class="text-green-800" x-show="chosen_arr">
                        Valt {{ $organizers->where('id',$lastevent->organizer_id)->first()->orgname }}.
                    </div>
                    <p class="mt-0 mb-4"> @if (old('organizer_id'))
                            Vald
                            organisatör: {{ $organizers->where('id',old('organizer_id'))->first()->orgname }}
                    </p> @endif
                </div>
                @livewire('select-artists')
                <div x-data="{timeofday: '', comment:'', link:''}">
                    <div class="mt-5"><label for="day">Datum:</label><br>
                        <input type="date" class="border rounded-lg mb-6"
                               value="{{ old('day') != null ? old('day') : ''}}" name="day">
                    </div>
                    <div>
                        <label for="timeofday">Klockslag:</label><br>
                        <input type="text"
                               @if(!old('timeofday'))x-model="timeofday" @endif
                               class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                               value="{{ old('timeofday') }}" name="timeofday"/>@if(!old('timeofday'))
                            <span class="ml-4 btn-small cursor-pointer"
                                  x-on:click="timeofday='{{ $lastevent->timeofday }}'">Senaste</span>
                        @endif
                    </div>
                    <div>
                        <label for="comment">Kommentar:</label><br>
                        <input type="text"
                               @if(!old('comment'))x-model="comment" @endif
                               class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                               value="{{ old('comment') }}" name="comment"/>@if(!old('comment'))
                            <span class="ml-4 btn-small cursor-pointer"
                                  x-on:click="comment='{{ $lastevent->comment }}'">Senaste</span>
                        @endif
                    </div>
                    <div>
                        <label for="link">Länk till info:</label><br>
                        <input type="text"
                               @if(!old('link'))x-model="link" @endif
                               class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                               value="{{ old('link') }}" name="link"/>@if(!old('link'))
                            <span class="ml-4 btn-small cursor-pointer" x-on:click="link='{{ $lastevent->link }}'">Senaste</span>
                        @endif
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
</x-app-layout>
