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
                    <p><a class="text-blue-800 text-xl" href="/events/create">Skapa evenemang</a></p>
                    <p><a class="text-blue-800 text-xl" href="/places/create">Skapa ort</a></p>
                    <p><a class="text-blue-800 text-xl" href="/places">Visa orter</a></p>
                    <p><a class="text-blue-800 text-xl" href="/organizers/create">Skapa organisatör</a></p>
                    <p><a class="text-blue-800 text-xl" href="/organizers">Visa organisatörer</a></p>
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
