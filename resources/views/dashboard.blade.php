<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><a class="text-blue-800 text-xl" href="/">Publik vy</a></p>
                    <p><a class="text-blue-800 text-xl" href="/events">Konserter</a></p>
                    <p><a class="text-blue-800 text-xl" href="/places">Orter</a></p>
                    <p><a class="text-blue-800 text-xl" href="/organizers">Arrangörer</a></p>
                    <p><a class="text-blue-800 text-xl" href="/artists">Artister</a></p>
                    <p><a class="text-blue-800 text-xl" href="/links/">Länkar</a></p>
                    <p><a class="text-blue-800 text-xl" href="/tips/">Tips</a></p>
                    <p><a class="text-blue-800 text-xl" href="/about/edit">Redigera sidan om sajten</a></p>
                    <p><a class="text-blue-800 text-xl" target=”_blank” href="https://pixe.la/v1/users/jazzankan/graphs/visits.html">Pixela statistik</a></p>
                    <p><a class="text-blue-800 text-xl" target=”_blank” href="/spiders">Kolla uppdateringar</a></p>
                    <div class="mt-4">
                        @php $visitingnumber = file_get_contents("../counter.txt");@endphp
                        Antal besök sedan 2022-12-30: <b>{{ $visitingnumber }}</b>
                    </div>
                    <div>
                        <livewire:place/>
                    </div>


                    <div style="text-align: center">
                        <p class="mt-7 text-sm"></p>
                        <p>Du är inloggad!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
