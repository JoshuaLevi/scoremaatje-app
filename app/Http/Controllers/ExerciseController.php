<?php

//namespace App\Http\Controllers;
//
//use App\Models\Exercise;
//use App\Models\User;
//use Illuminate\Http\Request;
//use JetBrains\PhpStorm\NoReturn;
//use App\Models;

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models;


class ExerciseController extends Controller
{
//    public function index(){
//        $exercises = Models\Exercise::all();
//        return view('exercises.index', ['exercises' => $exercises]);
//
//    }

//    public function index() {
////        $exercises = Exercise::where('user_id', auth()->id())->get();
////        return view('exercises.index', compact('exercises'));
////    }
/// public function index() {
//    if (auth()->user()->user_id === 2) {
//        // Als user_id gelijk is aan 2, toon alle exercises.
//        $exercises = Exercise::all();
//    } else {
//        // Anders, toon alleen de exercises van de ingelogde gebruiker.
//        $exercises = Exercise::where('user_id', auth()->id())->get();
//    }
//
//    return view('exercises.index', compact('exercises'));
//}

    public function index() {
        /** @var User $user */
        $user = auth()->user();

        if ($user->isAdmin()) {
            // Als de gebruiker een admin is, haal alle exercises op.
            $exercises = Exercise::all();
        } else {
            // Als de gebruiker geen admin is, haal alleen de exercises van de ingelogde gebruiker op.
            $exercises = Exercise::where('user_id', $user->id)->get();
        }

        return view('exercises.index', compact('exercises'));
    }

    public function create(){
        return view('exercises.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'muscle' => 'required',
            'description' => 'required'
        ]);


        if (auth()->user()->isAdmin()) {
            // Als de huidige gebruiker een admin is, gebruik de ID van de admin-gebruiker.
            $data['user_id'] = auth()->user()->id;
        } else {
            // Anders, gebruik de ID van de ingelogde gebruiker.
            $data['user_id'] = auth()->id();
        }

        $newExercise = Models\Exercise::create($data);

        return redirect(route('home'));
    }


    public function edit(Models\Exercise $exercise){
        return view('exercises.edit',['exercise' => $exercise]);
    }

    public function update(Models\Exercise $exercise, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'muscle' => 'required',
            'description' => 'required'

        ]);

        $exercise->update($data);

        return redirect(route('home'))->with('success', 'Exercise Updated Successfully');
    }

    public function destroy(Models\Exercise $exercise){
        $exercise->delete();
        return redirect(route('home'))->with('success', 'Exercise Deleted Successfully');
    }


}

