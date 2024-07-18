<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Place;
use App\Models\Organizer;
use Carbon\Carbon;
//use Livewire\WithPagination;

class PubEventsearch extends Component
{
    public $query;
    protected $events;
    public $places;
    public $organizers;
    public $today;
    public $today_string;

    function mount()
    {
        $this->today = Carbon::today();
        $this->today_string = $this->today->toDateString();
        $this->query = "";
        $this->events = Event::with(['place', 'organizer'])->where('day', '>=', $this->today)->orderBy('day');
        $this->places = Place::all()->sortBy('municipality');
        $this->organizers = Organizer::all()->sortBy('orgname');
    }

    public function newsearch()
    {
        $this->query = "";
        $this->places = Place::all()->sortBy('municipality');
        $this->organizers = Organizer::all()->sortBy('orgname');
        $this->events = Event::with(['place', 'organizer'])->where('day', '>=', $this->today)->orderBy('day');
    }

    public function updatedQuery()
    {
        $datearr = explode("-",$this->query);
        //checkdate requires mm/dd/yyyy

        if(count($datearr) == 3 && checkdate($datearr[1],$datearr[2],$datearr[0])){
            if($this->query < $this->today_string){
                $this->query = $this->today_string;
            }
            $this->events = Event::with(['place', 'organizer', 'artists'])->where('day', '>=', $this->query);
        }
        else {
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
        $this->organizers = Organizer::all()->sortBy('orgname');
        $this->places = Place::all()->sortBy('municipality');
    }



    public function render()
    {
        if($this->events == null) {
            return view('livewire.pub-eventsearch',
                ['events' => Event::all()->first(),
                    'organizers' => Organizer::all()->sortBy('orgname'),
                    'places' => Place::all()->sortBy('municipality')]);
        }
        else {
            return view('livewire.pub-eventsearch',
                ['events' => $this->events->orderBy('day')->get(),
                    'organizers' => Organizer::all()->sortBy('orgname'),
                    'places' => Place::all()->sortBy('municipality')]);
        }
    }
}
