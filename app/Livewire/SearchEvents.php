<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use Carbon\Carbon;

class SearchEvents extends Component
{
    public $query;
    public $events;
    public $coming;
    public $today;

    function emptyquery()
    {
        $this->query = "";
    }

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
        if ($this->coming === 1 || $this->coming === null) {
            $this->events = Event::with(['place', 'organizer','artists'])
                ->where('day', '>=', $this->today)
                ->where('name', 'like', '%' . $this->query . '%')
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
                })
                ->get();
        } else {
            $this->events = Event::with(['place', 'organizer'])->where('name', 'like', '%' . $this->query . '%')
                ->orWhereHas('place', function ($query) {
                    $query->where('municipality', 'like', '%' . $this->query . '%');
                })
                ->orWhereHas('organizer', function ($query) {
                    $query->where('orgname', 'like', '%' . $this->query . '%');
                })
                ->orWhereHas('artists', function ($query) {
                    $query->where('name', 'like', '%' . $this->query . '%');
                })
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.search-events');
    }
}
