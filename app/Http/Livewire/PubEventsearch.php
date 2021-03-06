<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Place;
use App\Models\Organizer;
use Carbon\Carbon;
use Livewire\WithPagination;

class PubEventsearch extends Component
{
    public $query;
    protected $events;
    public $places;
    public $organizers;
    public $today;


    function mount()
    {
        $this->today = Carbon::today();
        $this->query = "";
        $this->events = Event::with(['place', 'organizer'])->where('day', '>=', $this->today)->orderby('day');
        $this->places = Place::all()->sortBy('municipality');
        $this->organizers = Organizer::all()->sortBy('orgname');
    }

    public function newsearch()
    {
        $this->events = Event::with(['place', 'organizer'])->where('day', '>=', $this->today)->orderby('day');
        $this->query = "";
    }

    public function updatedQuery()
    {
        $this->events = Event::with(['place', 'organizer', 'artists'])
            ->where('name', 'like', '%' . $this->query . '%')->where('day', '>=', $this->today)
            ->orWhereHas('place', function ($query) {
                $query->where('municipality', 'like', '%' . $this->query . '%')
                    ->where('day', '>=', $this->today);
            })
            ->orWhereHas('organizer', function ($query) {
                $query->where('orgname', 'like', '%' . $this->query . '%')
                    ->where('day', '>=', $this->today);
            })
            ->orWhereHas('artists', function ($query) {
                $query->where('name', 'like', '%' . $this->query . '%')
                    ->where('day', '>=', $this->today);
            });

    }

    public function render()
    {
        return view('livewire.pub-eventsearch',
            ['events' => $this->events->orderBy('day')->paginate(10)]);
    }
}
