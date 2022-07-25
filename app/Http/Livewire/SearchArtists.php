<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Artist;

class SearchArtists extends Component
{
    public $query;
    public $artists;

    function emptyquery()
    {
        $this->query = "";
    }

    function mount()
    {
        $this->query = "";
        $this->artists = [];
    }

    public function updatedQuery()
    {
            $this->artists = Artist:: where('firstname', 'like', '%' . $this->query . '%')
                ->orWhere('lastname','like','%' . $this->query . '%')
                ->orWhere('instrument','like','%' . $this->query . '%')
                ->get();
    }

    public function render()
    {
        return view('livewire.search-artists');
    }
}
