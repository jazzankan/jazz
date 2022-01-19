<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class SearchEvents extends Component
{
    public $query;
    public $events;


    function mount(){
        $this->query = "";
        $this->events = [];
    }

    public function updatedQuery()
    {
        $this->events = Event::where('name','like','%' . $this->query . '%')
            ->get();
    }
    public function render()
    {
        return view('livewire.search-events');
    }
}
