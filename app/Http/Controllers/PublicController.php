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
           'name' => 'required | min:3',
            'email' => 'required | email',
            'body' => 'required | min:6',
            'human' => 'required | max:3 | in:sex,6,SEX,Sex'
        ]);

        return view('publicviews.thanks');
    }
}
