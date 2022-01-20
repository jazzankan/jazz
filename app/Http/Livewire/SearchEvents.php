<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class SearchEvents extends Component
{
    public $query;
    public $events;
    public $coming;


    function mount(){
        $this->query = "";
        $this->events = [];
        $this->coming = 1;
    }

    public function togglecoming()
    {
        $this->coming = 1 - $this->coming;
    }
    //Nedan ska in då att om coming är 1 så bara kommande, annars rubbet.
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
