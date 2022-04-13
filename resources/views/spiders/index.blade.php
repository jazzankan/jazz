<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Kolla uppdateringar av webbsidor') }}
    </h2>
</x-slot>
<div class="py-12">
    @livewire('check-sites')
</div>
</x-app-layout>
