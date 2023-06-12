<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return response()->json([
            'status' => true,
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            'selectedartists' => 'nullable| string',
            'day' => 'required | date',
            'timeofday' => 'nullable | max:15',
            'link' => 'nullable',
            'comment' => 'nullable | max:200',
            'note' => 'nullable | max:200',
            'artistnames' => 'nullable | string'
        ]);
        if (!$attributes) {
            return response()->json(['error' => true, 'error_msg' => 'invalid input']);
        }
        $event = Event::create(request(['name','place_id','organizer_id','day','timeofday','link','comment','note']));

        return response()->json([
            'status' => true,
            'message' => "Event Created successfully!",
            'event' => $event
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
