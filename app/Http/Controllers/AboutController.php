<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutentry = DB::table('about')->select('aboutheading','abouttext')->first();;

        return view('publicviews.about')->with('aboutentry', $aboutentry);
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
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $aboutentry = DB::table('about')->select('id','aboutheading','abouttext')->first();
        return view('about.edit')->with('aboutentry', $aboutentry);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $attributes = request()->validate([
            'aboutheading' => 'required | min:3',
            'abouttext' => 'required | min:6',
        ]);
        //$aboutentry = DB::table('about')->select('id','aboutheading','abouttext')->first();

        $affected = DB::table('about')
            ->where('id', 1)
            ->update(['aboutheading' => $request['aboutheading'], 'abouttext'=> $request['abouttext']]);

        return redirect('/about');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
