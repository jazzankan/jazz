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

        return view('spiders.index');
    }
}
