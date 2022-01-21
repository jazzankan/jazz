<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Place;
//use Illuminate\Support\Facades\DB;

class SearchEvents extends Component
{
    public $query;
    public $events;
    public $coming;
    public $places;


    function mount()
    {
        $this->query = "";
        $this->events = [];
        $this->coming = 1;
        $this->places = Place::all();
    }

    public function togglecoming()
    {
        $this->coming = 1 - $this->coming;
        $this->updatedQuery();
    }
/*->each(function($item){
    return $item*$item;
});
});*/
    //Nedan ska in då att om coming är 1 så bara kommande, annars rubbet.
    public function updatedQuery()
    {
        if ($this->coming === 1) {
            $this->events = Event::where('name', 'like', '%' . $this->query . '%')
                ->orWhere($this->places->each(function($item){$item->where($item->municipality, 'like', '%' . $this->query . '%');}))
                //->orWhere($this->places->each(function($key){$key = 'municipality'}, 'like', '%' . $this->query . '%')
                ->get();
        } else {
            $this->events = Event::where('name', 'like', '%' . $this->query . '%')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.search-events');
    }
}
