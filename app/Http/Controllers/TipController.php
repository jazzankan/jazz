<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tips = Tip::all()->sortByDesc('created_at');

        return view('tips.index')->with('links',$links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['pubstop'] == null){
            $request['pubstop'] = "2082-01-01";
        }

        $attributes = request()->validate([
            'headline' => 'required | min:3',
            'body' => 'required | min:3',
            'link' => 'required | min:12',
            'pubstart' => 'required | date',
            'pubstop' => 'required | date'
        ]);
        Tip::create($attributes);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function show(Tip $tip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function edit(Tip $tip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tip $tip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tip $tip)
    {
        //
    }
}
