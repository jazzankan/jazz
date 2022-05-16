<x-guest-layout>
    <div class="md:ml-60">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl">Kul att du vill kontakta oss!</h2>
            <p class="mt-3">Här kan du:</p>
            <ul class="list-disc my-4">
                <li>Tipsa om konserter som borde vara med i listan.</li>
                <li>Tipsa om festivaler och andra jazzhändelser.</li>
                <li>Ställa frågor och komma med synpunkter.</li>
            </ul>
            <p class="mb-6">Ditt namn och din e-postadress sparas inte i Jazztiders databas och sprids inte vidare på något sätt!</p>
            <form method="post" action="{{ route('contact') }}">
                @csrf
                <div>
                    <div>
                        <p><label for="name">Namn - gärna ditt riktiga:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('name') }}" name="name" required/></p>
                        <p><label for="email">E-post:</label><br>
                            <input type="email"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ old('email') }}" name="email" required/>
                        <div class="form-group mt-3">
                            <label for="body">Min text:</label><br>
                            <textarea class="mb-6 w-3/5 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                                      id="body" name="body" required>{{ old('body') }}</textarea>
                        </div>
                        <div>
                            <label for="name">Människotest. Vad kommer efter fem?</label><br>
                            <input type="text"
                                   class="max-w-xs mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="" name="human" maxlength="3" required/></p>
                        </div>
                    </div>
                </div>
                <p>
                    <button type="submit" class="btn-blue">Skicka</button>
                </p>
            </form>
            <div>
                <p>
                @if ($errors->any())
                    <div class="text-red-600">
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
    </div>
</x-guest-layout>
