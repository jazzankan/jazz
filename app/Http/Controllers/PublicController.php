<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\Contactmessage;

class PublicController extends Controller
{
    public function __construct()
    {
        //Behövs?
    }

    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');

        $links = Link::where('pubstart','<=',$today)->where('pubstop','>',$today)->orderBy('prio','DESC')->orderBy('linktext','ASC')->get();

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
        $user = User::where('name','Anders')->first();

        $user->notify(new Contactmessage($attributes));

        return view('publicviews.thanks');
    }
}
