<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Organizer;
use App\Models\SpiderData;

class CheckSites extends Component
{
    public $organizers;
    public $hideid;

    function mount()
    {

        $this->organizers = Organizer::whereHas('spiderdata', function ($q) {
            $q->where('warning', '1');
        })->get();
        $this->hideid = 0;
    }

    function clearsite($orgid)
    {
        $spiderdata = SpiderData::where('organizer_id',$orgid)->first();
        $spiderdata->warning = 0;
        $spiderdata->save();
        $this->hideid = $orgid;
    }

    public function render()
    {
        return view('livewire.checksites')->with('hideid',$this->hideid);
    }
}
