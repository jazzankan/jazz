<x-guest-layout>
    <div class="bg-blue-100 rounded-lg max-w-screen-xl m-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 md:gap-3">
            <div class="m-2.5 md:border-r md:border-red-700 md:col-span-3">
                <h1 class="mv-2 text-3xl text-center">Länkar</h1>
            </div>
            <div class="m-2.5 md:col-span-6">
                <h1 class="mv-2 mb-4 text-3xl text-center">Evenemang</h1>
                <div>
                @livewire('pub-eventsearch')
                </div>

        </div>
        <div class="m-2.5 md:border-l md:border-red-700 md:col-span-3">
            <h1 class=" mv-2 text-3xl text-center">Meddelanden</h1>
        </div>
    </div>
    </div>
</x-guest-layout>
