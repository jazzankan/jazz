<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\SpiderData;
use App\Models\Place;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        if($request['interval'] != null){
           $orgid = Organizer::latest()->first()->value('id');
           $warning = 0;
           $headstring = "not spidered";
           $interval = $request['interval'];
           SpiderData::create(['organizer_id' => $orgid,'warning' => $warning, 'headstring' => $headstring, 'dayinterval' => $interval]);
        }

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
        $places = Place::all()->sortBy('municipality');

        return view('/organizers.edit')->with('organizer',$organizer)->with('places',$places);
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
        $today = Carbon::today();
        if($request['delete'] === 'delete'){
            if($organizer->events()->get()->isEmpty()){
            $this->destroy($organizer);
                return redirect('/organizers');
            }
            else {
                return redirect()->back()->withErrors(['message1'=>'Kan inte tas bort, eftersom konsert finns.']);
            }
        }

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
        //om inga events finns.
        $organizer->delete();
    }
}
