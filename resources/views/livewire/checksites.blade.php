<div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
    @foreach($organizers as $o)
        @if($o->spiderdata->warning == 1 && $hideid != $o->id)<p id="{{ $o->id }}" class="py-2"  >{{ $o->orgname }} <span wire:click="clearsite({{ $o->id }})" class="btn-small cursor-pointer">Klar</span></p>@endif
    @endforeach
</div>
