<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spiders\SodertornSpider;

class SpiderController extends Controller
{
    public function index()
    {
        return view('spiders.index');
    }
}
