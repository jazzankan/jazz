<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skapa nytt event') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="post" action="{{ route('events.store') }}">
                    @csrf
                    <div class="pl-2">
                        <label for="title">Namn:</label><br>
                        <input type="text" class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" value="{{ old('title') }}" name="title"/>
                        <div>
                            <label for="description">Beskrivning:</label><br>
                            <textarea class="mb-6 w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4" id="description" name="description">{!! old('description') !!}</textarea>
                        </div>
                        <div class="mt-5"><label for="deadline">Datum:</label><br>
                            <input type="date" class="border rounded-lg mb-6" value="{{ old('deadline') != null ? old('deadline') : ''}}" name="date">
                        </div>
                        <div class="mb-6">
                            <label><input type="radio" name="must" value="y" {{ (old('must') === 'n') ? '' : 'checked' }}> Plikt</label>
                            <label><input type="radio" name="must" {{ (old('must') === 'n') ? 'checked' : '' }} value="n"> Hobby eller nöje</label>
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
