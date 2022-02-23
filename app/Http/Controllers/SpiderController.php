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

        $headlines = HeadlinesProcessor::class::ProcessItem();
        dd($headlines);
        return view('spiders.index');
    }
}
