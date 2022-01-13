<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Artist;

class SelectArtists extends Component
{
public $query;
public $artists;
public $selectedartistnames;

function mount(){
    $this->query = "";
    $this->artists = [];
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
