<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spiders\JazzSpider;
use RoachPHP\Roach;
use RoachPHP\ItemPipeline\Item;

class SpiderController extends Controller
{
    public function index()
    {
        Roach::startSpider(JazzSpider::class);
        $item = new Item;
        $headlines = $item->get();
        //$headlines = $item->all();
        //$headlines = $headlines->item();
        //$headlines = $headlines->getResponse();
        dd($headlines);
        return view('spiders.index');
    }
}
