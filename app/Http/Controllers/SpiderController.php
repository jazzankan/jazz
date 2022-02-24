<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spiders\JazzSpider;
use App\Spiders\Processors\HeadlinesProcessor;
use RoachPHP\Roach;
//use RoachPHP\ItemPipeline\ItemProcessor\HeadlinesProcessor;

class SpiderController extends Controller
{
    public function index()
    {
        Roach::startSpider(JazzSpider::class);

        $headlines =
        dd($headlines);
        return view('spiders.index');
    }
}
