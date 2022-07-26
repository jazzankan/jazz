<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::latest()->limit(10)->get();
        $totalartists = Artist::all();

        return view('/artists.index')->with('artists',$artists)->with('totalartists',$totalartists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artists.create');
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
            'name' => 'required | min:4',
            'instrument' => 'nullable | min:3',
            'memberof' => 'nullable | min:3',
            'comment' => 'nullable | max:200',
            'note'    => 'nullable | max:200'
        ]);
        Artist::create($attributes);

        return redirect('/artists');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit')->with('artist',$artist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $attributes = request()->validate([
            'name' => 'required | min:4',
            'instrument' => 'nullable | min:3',
            'memberof' => 'nullable | min:3',
            'comment' => 'nullable | max:200',
            'note'    => 'nullable | max:200'
        ]);

        $artist->update(request(['name','instrument','memberof','comment','note']));

        return redirect('/artists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
