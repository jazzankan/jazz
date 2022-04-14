<div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
    @foreach($organizers as $o)
        <p class="py-2">{{ $o->orgname }} <span wire:click="clearsite( {{ $o->id }})" class="btn-small cursor-pointer">Klar</span></p>
    @endforeach
</div>
