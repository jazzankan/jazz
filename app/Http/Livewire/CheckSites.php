<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Organizer;
use App\Models\SpiderData;

class CheckSites extends Component
{
    public $organizers;

    function mount()
    {
        $this->organizers = Organizer::whereHas('spiderdata', function ($q) {
            $q->where('warning', '1');
        })->get();
    }

    function clearsite($orgid)
    {
        $spiderdata = SpiderData::where('organizer_id',$orgid)->first();
        $spiderdata->warning = 0;
        $spiderdata->save();
    }

    public function render()
    {
        return view('livewire.checksites');
    }
}
