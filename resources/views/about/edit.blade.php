<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Redigera text om sajten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="post" action="{{ route('about.update', $aboutentry->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="pl-2">
                        <div>
                            <label for="aboutheading">Rubrik:</label><br>
                            <input type="text"
                                   class="max-w-lg w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
                                   value="{{ $aboutentry->aboutheading }}" name="aboutheading"/>
                        </div>
                        <div>
                            <label for="body">Text:</label><br>
                        <textarea id="abouttext" class="tinyMce mb-6 w-5/6" rows="15" name="abouttext">
                            {{ $aboutentry->abouttext }}
                        </textarea>
                    </div>
                        <button type="submit" class="btn-blue mt-3">Skicka</button>
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
    <script src="https://cdn.tiny.cloud/1/rnox0zpq1lxyhd7mp4frpzujxi3ucuolnrem61k8g7lwq691/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.tinyMce', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists link',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | link '
        });
    </script>

</x-app-layout>
