<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\Place;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizers = Organizer::all()->sortBy('orgname');

        return view('/organizers.index')->with('organizers',$organizers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::all()->sortBy('municipality');

        return view('/organizers/create')->with('places',$places);
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
            'orgname' => 'required | min:3',
            'orglink' => 'nullable',
            'place_id' => 'required | integer',
            'comment' => 'nullable | max:200',
            'note'    => 'nullable | max:200'
        ]);
        $memory = Organizer::create($attributes);

        return redirect('/organizers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function show(Organizer $organizer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizer $organizer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organizer $organizer)
    {
        $attributes = request()->validate([
            'orgname' => 'required | min:3',
            'orglink' => 'nullable',
            'place_id' => 'required | integer',
            'comment' => 'nullable | max:200',
            'note'    => 'nullable | max:200'
        ]);
        $organizer->update(request(['orgname','orglink','place_id','comment','note']));

        return redirect('/organizers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizer $organizer)
    {
        //
    }
}
