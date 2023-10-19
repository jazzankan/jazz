<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skapa tips') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="post" action="{{ route('tips.store') }}">
                    @csrf
                    <div class="pl-2">
                        <div>
                            <label for="headline">Rubrik:</label><br>
                            <input type="text"
                                   id="headline"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('headline') }}" name="headline"/>
                        </div>
                        <div>
                            <label for="body">Text:</label><br>
                            <input type="text"
                                   id="body"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('body') }}" name="body"/>
                        </div>
                        <div>
                            <label for="link">Länk:</label><br>
                                <input type="text"
                                       id="link"
                                       class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                       value="{{ old('link') }}" name="link"/>
                        </div>
                        <div>
                        <label for="shownr">Visningsprio:</label><br>
                        <select name="shownr" id="shownr" class="border rounded-lg">
                            <option value=1 @selected(old('shownr') == 1)>1</option>
                            <option value=2 @selected(old('shownr') == 2)>2</option>
                            <option value=3 @selected(old('shownr') == null)>3</option>
                        </select>
                        </div>
                        <div class="mt-4"><label for="start">Startdatum:</label><br>
                            <input type="date" id="start" class="border rounded-lg mb-6"
                                   value="{{ old('pubstart') != null ? old('pubstart') : $today }}" name="pubstart">
                        </div>
                        <div class="mt-1"><label for="stop">Slutdatum (lämna blank om evig):</label><br>
                            <input type="date" id="stop" class="border rounded-lg mb-6"
                                   value="{{ old('pubstop') != null ? old('pubstop') : '' }}" name="pubstop">
                        </div>
                        <button type="submit" class="btn-blue">Skapa</button>
                    </div>
                </form>
            </div>
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
</x-app-layout>
