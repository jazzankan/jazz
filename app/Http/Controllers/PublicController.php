<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;
use App\Models\Link;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\Contactmessage;
use Illuminate\Support\Facades\DB;

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
        $tips = Tip::where('pubstart','<=',$today)->where('pubstop','>=',$today)->orderBy('shownr','ASC')->orderBy('created_at','DESC')->get();

        if(!auth()->user()) {
            $visitingnumber = file_get_contents("../counter.txt");
            $dayvisits = file_get_contents("../daycounter.txt");
            //Försök att förhindra reset med en  if-sats. Funktionen kan tydligen returnera en tom sträng ibland.
            if($visitingnumber != "") {
                $visitingnumber = (int)$visitingnumber + 1;
                file_put_contents("../counter.txt", $visitingnumber);
            }
            if($dayvisits != "") {
                $dayvisits = (int)$dayvisits + 1;
                file_put_contents("../daycounter.txt", $dayvisits);
            }
        }

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
