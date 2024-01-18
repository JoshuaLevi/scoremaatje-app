<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->is_admin)
        {
            return view('test2', ['exercises' => Exercise::all()]);
        }else {
            $exercises = Exercise::where('user_id', Auth::user()->id)->get();
            return view('test1', ['exercises' => $exercises, 'user_id' => Auth::user()->id]);
        }
    }
}
