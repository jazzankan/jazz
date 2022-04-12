<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Kolla uppdateringar av webbsidor') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
        @foreach($orgcheck as $o)
        <p>{{ $o->orgname }} </p>
        @endforeach
    </div >
    @livewire('check-sites')
</div>
</x-app-layout>
