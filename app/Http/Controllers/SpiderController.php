<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spiders\JazzSpider;
use RoachPHP\Roach;
use RoachPHP\ItemPipeline\ItemProcessor\HeadlinesProcessor;

class SpiderController extends Controller
{
    public function index()
    {
        Roach::startSpider(JazzSpider::class);
        //$title = JazzSpider::item();
        //dd($title);

        return view('spiders.index');
    }
}
