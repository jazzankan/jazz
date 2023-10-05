<?php

namespace App\Livewire;

use Livewire\Component;

class Place extends Component
{
    public $place = 0;
    public function increment()
    {
        $this->place++;
    }

    public function render()
    {
        return view('livewire.place');
    }
}
