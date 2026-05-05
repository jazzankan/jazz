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
        //Roach taget ur bruk
        //Roach::startSpider(JazzSpider::class);

        return view('spiders.index');
    }
    public function destroy(Spider $spider)
    {
        $spider->delete();
    }
}

