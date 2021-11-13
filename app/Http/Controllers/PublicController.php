<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class PublicController extends Controller
{
    public function __construct()
    {
        //Behövs?
    }

    public function index()
    {
        $events = Event::all();
        return view('publicviews.index')->with('events',$events);
    }
}
