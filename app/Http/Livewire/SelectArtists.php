<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SelectArtists extends Component
{
public $query;
public $artists;

public function updatedQuery()
{
    $this->artists = Artist::where('name','like','%' . $this->query . '%');
}
    public function render()
    {
        return view('livewire.select-artists')
            ->get()
            ->toArray();
    }
}
