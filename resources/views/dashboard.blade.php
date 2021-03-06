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
                    <p><a class="text-blue-800 text-xl" href="/events">Konserter</a></p>
                    <p><a class="text-blue-800 text-xl" href="/places">Orter</a></p>
                    <p><a class="text-blue-800 text-xl" href="/organizers">Arrangörer</a></p>
                    <p><a class="text-blue-800 text-xl" href="/artists">Artister</a></p>
                    <p><a class="text-blue-800 text-xl" href="/links/">Länkar</a></p>
                    <p><a class="text-blue-800 text-xl" href="/tips/">Tips</a></p>
                    <p><a class="text-blue-800 text-xl" href="/spiders">Kolla uppdateringar</a></p>
                    <div>
                    <livewire:place />
                    </div>


                    <div style="text-align: center">
                    <p class="mt-7 text-sm"><hr>Du är inloggad!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
