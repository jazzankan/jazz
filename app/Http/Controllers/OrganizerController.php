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
            'note'    => 'nullable | max:200',
            'interval' => 'required | integer'
        ]);
        array_pop($attributes);
        $memory = Organizer::create($attributes);

        if($request['interval'] != null){
           $orgid = Organizer::latest()->value('id');
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
            $spider = SpiderData::where('organizer_id', $organizer->id)->get();
            $organizer->spiderdata->destroy($spider);
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
            'note'    => 'nullable | max:200',
            'interval' => 'required | integer'
        ]);
        $organizer->update(request(['orgname','orglink','place_id','comment','note']));

        if($request['interval'] != null){
            $interval = $request['interval'];
            if(!$organizer->spiderdata){
                $orgid = $organizer->id;
                $warning = 0;
                $headstring = "not spidered";
                SpiderData::create(['organizer_id' => $orgid,'warning' => $warning, 'headstring' => $headstring, 'dayinterval' => $interval]);
            }
            else {
                $organizer->spiderdata->update(['dayinterval' => $interval]);
            }
        }



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
