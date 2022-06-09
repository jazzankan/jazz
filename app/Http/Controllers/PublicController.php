<?php

namespace App\Http\Controllers;

use App\Models\Tip;
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
        $tips = Tip::all()->sortByDesc('created_at');

        return view('publicviews.index')->with('links',$links)->with('tips',$tips);
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
