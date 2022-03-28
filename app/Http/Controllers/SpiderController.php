<?php

namespace App\Http\Controllers;

use App\Spiders\JazzSpider;
use RoachPHP\Http\Response;
use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\Roach;


class SpiderController extends Controller
{
    public function index()
    {
        Roach::startSpider(JazzSpider::class);
        //$jazz = new JazzSpider;
        //$jazzurls = $jazz->startUrls;
        //$jazzrequest = $jazz->getInitialRequests();
        //$jazzprocessor = new HeadlinesProcessor;
        //$jazzitem = ItemInterface::class::all();
        //$jazzitem = $jazz->item()->all();
        //$jazzitem = $response->getBody();
        //$jazzitem = $jazz->all();
        //$jazz = new JazzSpider;
        //$jazzitem = $jazz->extract(['_text']);
        //$headlines = $item->all();
        //$headlines = $headlines->item();
        //$headlines = $headlines->getResponse();
        return view('spiders.index');
    }
}
