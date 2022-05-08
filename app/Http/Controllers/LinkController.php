<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::all()->sortBy('linktext');
        return view('links.index')->with('links',$links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['external'] = filter_var($request['external'], FILTER_VALIDATE_BOOLEAN);
        $request['prio'] = filter_var($request['prio'], FILTER_VALIDATE_BOOLEAN);

         if($request['pubstop'] == null){
             $request['pubstop'] = "2082-01-01";
         }

        $attributes = request()->validate([
            'linktext' => 'required | min:3',
            'url' => 'required | url',
            'comment' => 'nullable',
            'external' => 'required | boolean',
            'prio' => 'required | boolean',
            'pubstart' => 'required | date',
            'pubstop' => 'required | date'
        ]);
        $memory = Link::create($attributes);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('links.edit')->with('link',$link);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {

        $request['external'] = filter_var($request['external'], FILTER_VALIDATE_BOOLEAN);
        $request['prio'] = filter_var($request['prio'], FILTER_VALIDATE_BOOLEAN);

        $attributes = request()->validate([
            'linktext' => 'required | min:3',
            'url' => 'required | url',
            'comment' => 'nullable',
            'external' => 'required | boolean',
            'prio' => 'required | boolean',
            'pubstart' => 'required | date',
            'pubstop' => 'required | date'
        ]);
        $link->update(request(['linktext','url','comment','external','prio','pubstart','pubstop']));

        return redirect('/links');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
