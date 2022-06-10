<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Redigera länk') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="post" action="{{ route('links.update',$link->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="pl-2">
                        <div>
                            <label for="linktext">Länktext:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $link->linktext }}" name="linktext"/>
                        </div>
                        <div>
                            <label for="url">URL:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $link->url }}" name="url"/>
                        </div>
                        <div>
                            <label for="url">Kommentar</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $link->comment }}" name="comment"/>
                        </div>
                        <div class="form-check">
                            <input @if($link->external)checked="checked"@endif value="true" name="external"  class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                            <label class=" mb-4 form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                Extern länk
                            </label>
                        </div>
                        <div class="form-check">
                            <input @if($link->prio)checked="checked" @endif value="true" name="prio" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox">
                            <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                Priolänk
                            </label>
                        </div>
                        <div class="mt-4"><label for="day">Startdatum:</label><br>
                            <input type="date" class="border rounded-lg mb-6"
                                   value="{{ $link->pubstart != null ? $link->pubstart : ''}}" name="pubstart">
                        </div>
                        <div class="mt-1"><label for="day">Slutdatum:</label><br>
                            <input type="date" class="border rounded-lg mb-6"
                                   value="{{ $link->pubstop != null ? $link->pubstop : ''}}" name="pubstop">
                        </div>
                        <div class="my-4">
                            <input type="checkbox" class="custom-control-input" id="delete" name="delete" value="delete">
                            <label class="custom-control-label" for="delete">Ta bort länken helt!</label>
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
