<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spiders\JazzSpider;
use App\Spiders\Processors\HeadlinesProcessor;
use RoachPHP\Roach;
use RoachPHP\Http\Response;
use RoachPHP\ItemPipeline\Item;

class SpiderController extends Controller
{
    public function index()
    {
        Roach::startSpider(JazzSpider::class);
        $headlines = 2;
        //$headlines = $item->all();
        //$headlines = $headlines->item();
        //$headlines = $headlines->getResponse();
        dd($headlines);
        return view('spiders.index');
    }
}
