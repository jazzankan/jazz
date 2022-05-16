<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Carbon\Carbon;

class PublicController extends Controller
{
    public function __construct()
    {
        //Behövs?
    }

    public function index()
    {
        $links = Link::all()->sortByDesc('prio')->sortByDesc('created_at');
        return view('publicviews.index')->with('links',$links);
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
           // 'linktext' => 'required | min:3',
        ]);


        return view('/dashboard');
    }
}
