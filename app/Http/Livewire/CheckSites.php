<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Organizer;
use App\Models\SpiderData;
use Carbon\Carbon;

class CheckSites extends Component
{
    public $organizers;
    public $hideid;

    function mount()
    {
        $this->checkinterval();
        $this->organizers = Organizer::whereHas('spiderdata', function ($q) {
            $q->where('warning', '1');
        })->get();
        $this->hideid = 0;
    }

    function checkinterval(){
        $allorgs = Organizer::all();
        foreach ($allorgs as $ao) {
            if ($ao->spiderdata != null) {
                //dd($ao->spiderdata->updated_at->addDay($ao->spiderdata->dayinterval)->toDateString());
                //dd(Carbon::today()->toDateString());
                if ($ao->spiderdata->updated_at->addDay($ao->spiderdata->dayinterval)->toDateString() < Carbon::today()->toDateString()) {
                    $ao->spiderdata->warning = 1;
                    $ao->spiderdata->save();
                }
            }
        }
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
