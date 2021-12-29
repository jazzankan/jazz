<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Artist;

class SelectArtists extends Component
{
public $query;
public $artists;
public $selectedartists = [];

function mount(){
    $this->query = "";
    $this->artists = [];
}
    function addartist($artistid)
    {
        array_push($this->selectedartists,$artistid);

    }

public function updatedQuery()
{
    $this->artists = Artist::where('name','like','%' . $this->query . '%')
        ->get();
    //dd($this->artists);
}
    public function render()
    {
        return view('livewire.select-artists');
    }
}
