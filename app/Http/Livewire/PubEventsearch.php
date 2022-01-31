<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Place;
use App\Models\Organizer;
use Carbon\Carbon;

class PubEventsearch extends Component
{
    public $query;
    public $events;
    public $places;
    public $selplace;
    public $organizers;
    public $today;

    function emptyquery()
    {
        $this->query = "";
    }

    function mount()
    {
        $this->query = "";
        $this->selplace = "";
        $this->events = [];
        $this->places = Place::all()->sortBy('municipality');
        $this->organizers = Organizer::all()->sortBy('orgname');
        $this->today = Carbon::today();
    }
    public function updatedQuery()
    {
        $this->events = Event::with(['place', 'organizer','artists'])
            ->WhereHas('place', function ($query) {
                $query->where('municipality', 'like', '%' . $this->query . '%')
                    ->where('day', '>=', $this->today);
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.pub-eventsearch');
    }
}
