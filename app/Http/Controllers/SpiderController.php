<?php

namespace App\Http\Controllers;

use App\Spiders\JazzSpider;
use App\Models\Organizer;
use App\Models\SpiderData;
use RoachPHP\Roach;


class SpiderController extends Controller
{
    public function index()
    {
        Roach::startSpider(JazzSpider::class);

     $orgcheck = Organizer::whereHas('spiderdata', function($q){
         $q->where('warning', '1');
     })->get();

        return view('spiders.index')->with('orgcheck',$orgcheck);
    }
    public function destroy(Spider $spider)
    {
        $spider->delete();
    }
}

