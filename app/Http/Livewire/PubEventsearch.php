<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Place;
use App\Models\Organizer;
use Carbon\Carbon;

class PubEventsearch extends Component
{
    public $places;
    public $organizers;

    function mount()
    {
        $this->query = "";
        $this->places = Place::all()->sortBy('municipality');
        $this->organizers = Organizer::all()->sortBy('orgname');
        $this->today = Carbon::today();
    }

    public function render()
    {
        return view('livewire.pub-eventsearch');
    }
}
