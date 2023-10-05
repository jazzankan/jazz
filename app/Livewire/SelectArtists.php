<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Artist;

class SelectArtists extends Component
{
public $query;
public $artists;
public $selectedartistnames;
public $selectedartistids;

function mount(){
    $this->query = "";
    $this->artists = [];
}

public function updatedQuery()
{
    $this->artists = Artist::where('name','like','%' . $this->query . '%')
        ->get();
}
    public function render()
    {
        return view('livewire.select-artists');
    }
}
