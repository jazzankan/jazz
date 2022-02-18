<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spiders\JazzSpider;
use RoachPHP\Roach;

class SpiderController extends Controller
{
    public function index()
    {
        $titles = Roach::startSpider(JazzSpider::class)->item();

        //$title = Response::class->$this->title;
        dd($titles);
        return view('spiders.index');
    }
}
