<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Place;
use Carbon\Carbon;

class PublicController extends Controller
{
    public function __construct()
    {
        //Behövs?
    }

    public function index()
    {
        $today = Carbon::today();
        $events = Event::with(['place','organizer'])->where('day','>=',$today)
            ->paginate(10 );
        //dd($events);
        return view('publicviews.index')->with('events',$events);
    }
}
