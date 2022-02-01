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
        $this->today = Carbon::today();
        $this->query = "xxx";
        $this->selplace = "";
        $this->events = Event::with(['place','organizer'])->where('day','>=',$this->today)->orderby('day')->get();
        $this->places = Place::all()->sortBy('municipality');
        $this->organizers = Organizer::all()->sortBy('orgname');
    }
    public function updatedQuery()
    {
        $this->events = Event::with(['place', 'organizer','artists'])
            ->where('name','like', '%' . $this->query . '%' )
            ->orWhereHas('place', function ($query) {
                $query->where('municipality', 'like', '%' . $this->query . '%')
                    ->where('day', '>=', $this->today);
            })
            ->orWhereHas('organizer', function ($query) {
                $query->where('orgname', 'like', '%' . $this->query . '%')
                    ->where('day', '>=', $this->today);
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.pub-eventsearch');
    }
}
