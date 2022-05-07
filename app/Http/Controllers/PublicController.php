<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Carbon\Carbon;

class PublicController extends Controller
{
    public function __construct()
    {
        //Behövs?
    }

    public function index()
    {
        $links = Link::all();
        return view('publicviews.index')->with('links',$links);
    }
}
