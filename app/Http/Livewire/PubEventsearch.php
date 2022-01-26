<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Place;
use Carbon\Carbon;

class PubEventsearch extends Component
{
    public $places;

    function mount()
    {
        $this->query = "";
        $this->places = Place::all()->sortBy('municipality');
        $this->coming = 1;
        $this->today = Carbon::today();
    }

    public function render()
    {
        return view('livewire.pub-eventsearch');
    }
}
