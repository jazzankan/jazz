<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        //Behövs?
    }

    public function index()
    {
        return view('publicviews.index');
    }
}
