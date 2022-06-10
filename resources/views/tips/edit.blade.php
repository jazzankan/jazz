<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Redigera tips tips') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="post" action="{{ route('tips.update',$tip->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="pl-2">
                        <div>
                            <label for="headline">Rubrik:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $tip->headline }}" name="headline"/>
                        </div>
                        <div>
                            <label for="body">Text:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $tip->body }}" name="body"/>
                        </div>
                        <div>
                            <label for="link">Länk:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $tip->link }}" name="link"/>
                        </div>
                        <div class="mt-4"><label for="day">Startdatum:</label><br>
                            <input type="date" class="border rounded-lg mb-6"
                                   value="{{ $tip->pubstart != null ? $tip->pubstart : ''}}" name="pubstart">
                        </div>
                        <div class="mt-1"><label for="day">Slutdatum (lämna blank om evig):</label><br>
                            <input type="date" class="border rounded-lg mb-6"
                                   value="{{ $tip->pubstop != null ? $tip->pubstop : ''}}" name="pubstop">
                        </div>
                        <div class="form-group">
                            <div class="my-4">
                                <input type="checkbox" class="custom-control-input" id="delete" name="delete" value="delete">
                                <label class="custom-control-label" for="delete">Ta bort tipset helt!</label>
                            </div>
                        </div>
                        <button type="submit" class="btn-blue">Skicka</button>
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
