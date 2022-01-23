<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Place;
use Carbon\Carbon;

class SearchEvents extends Component
{
    public $query;
    public $events;
    public $coming;
    public $places;
    public $today;


    function mount()
    {
        $this->query = "";
        $this->events = [];
        $this->coming = 1;
        $this->today = Carbon::today();
    }

    public function togglecoming()
    {
        $this->coming = 1 - $this->coming;
        $this->updatedQuery();
    }

    public function updatedQuery()
    {
        dd($this->today);
        if ($this->coming === 1 || $this->coming === null) {
            $this->events = Event::with(['place', 'organizer'])->where('day','>=',$this->today)->where('name', 'like', '%' . $this->query . '%')
                ->orWhereHas('place', function ( $query ){
                    $query->where('municipality','like', '%' . $this->query . '%');
                })
                ->orWhereHas('organizer', function ( $query ){
                    $query->where('orgname','like', '%' . $this->query . '%');
                })
                ->get();
        } else {
            $this->events = Event::with(['place', 'organizer'])->where('name', 'like', '%' . $this->query . '%')
                ->orWhereHas('place', function ( $query ){
                    $query->where('municipality','like', '%' . $this->query . '%');
                })
                ->orWhereHas('organizer', function ( $query ){
                    $query->where('orgname','like', '%' . $this->query . '%');
                })
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.search-events');
    }
}
