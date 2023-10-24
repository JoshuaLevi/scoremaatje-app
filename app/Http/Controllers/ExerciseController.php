<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;
use App\Models;

class ExerciseController extends Controller
{
    public function index(){
        $exercises = Models\Exercise::all();
        return view('exercises.index', ['exercises' => $exercises]);

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
