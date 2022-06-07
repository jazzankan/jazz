<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skapa tips') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="post" action="{{ route('links.store') }}">
                    @csrf
                    <div class="pl-2">
                        <div>
                            <label for="linktext">Länktext:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('linktext') }}" name="linktext"/>
                        </div>
                        <div>
                            <label for="url">URL:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('url') }}" name="url"/>
                        </div>
                        <div>
                            <label for="url">Kommentar</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('comment') }}" name="comment"/>
                        </div>
                        <div class="form-check">
                            <input checked="checked" value="true" name="external"  class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
                            <label class=" mb-4 form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                Extern länk
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="true" name="prio" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                Priolänk
                            </label>
                        </div>
                        <div class="mt-4"><label for="day">Startdatum:</label><br>
                            <input type="date" class="border rounded-lg mb-6"
                                   value="{{ old('pubstart') != null ? old('pubstart') : ''}}" name="pubstart">
                        </div>
                        <div class="mt-1"><label for="day">Slutdatum (lämna blank om evig):</label><br>
                            <input type="date" class="border rounded-lg mb-6"
                                   value="{{ old('pubstop') != null ? old('pubstop') : ''}}" name="pubstop">
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
