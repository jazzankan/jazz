<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spiders\SodertornSpider;

class SpiderController extends Controller
{
    public function index()
    {

        return view('events.index')->with('events',$events)->with('today',$today);
    }
}
