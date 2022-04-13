<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Organizer;

class CheckSites extends Component
{
    public $organizers;

    function mount()
    {
        $this->organizers = Organizer::whereHas('spiderdata', function ($q) {
            $q->where('warning', '1');
        })->get();
    }

    function clearsite()
    {

    }

    public function render()
    {
        return view('livewire.checksites');
    }
}
