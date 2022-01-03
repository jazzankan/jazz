<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Place;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();
        $events = Event::where('day','>',$today)->get()->sortByDesc('created_at');

        return view('events.index')->with('events',$events)->with('today',$today);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::all()->sortBy('municipality');
        $organizers = Organizer::all()->sortBy('orgname');


        return view('events.create')->with('places',$places)->with('organizers',$organizers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required | min:3',
            'place_id' => 'required | integer',
            'organizer_id' => 'required | integer',
            'selectedartists' => 'nullable',
            'day' => 'required | date',
            'timeofday' => 'nullable | max:15',
            'link' => 'nullable',
            'comment' => 'nullable | max:200',
            'note' => 'nullable | max:200'
        ]);
        dd($request['selectedartists']);
        $event = Event::create($attributes);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $places = Place::all()->sortBy('municipality');
        $organizers = Organizer::all()->sortBy('orgname');

        return view('events.edit')->with('event',$event)->with('places',$places)->with('organizers',$organizers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $attributes = request()->validate([
            'name' => 'required | min:3',
            'place_id' => 'required | integer',
            'organizer_id' => 'required | integer',
            'day' => 'required | date',
            'timeofday' => 'nullable | max:15',
            'link' => 'nullable',
            'comment' => 'nullable | max:200',
            'note' => 'nullable | max:200'
        ]);
        $event->update(request(['name','place_id','organizer_id','day','timeofday','link','comment','note']));
        return redirect('/events/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
