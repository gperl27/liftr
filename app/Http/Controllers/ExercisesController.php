<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use App\Exercise;

class ExercisesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  	public function new($workout_id){
  		// $workout = Workout::find($workout_id);
  		return view('new_exercise', compact('workout_id'));
  	}

  	public function create(Request $request, Workout $workout){
  		$workout->exercises()->create($request->all());
  		return redirect("/workouts/$workout->id");
  	}

  	public function destroy(Request $request, Exercise $exercise){
  		$exercise->delete();
  		return back();
  	}

  	public function edit(Exercise $exercise){
  		return view('update_exercise', compact('exercise'));
  	}



/*
	Needs fixing on routes/http_parse_params(param)
 */
  	public function update(Request $request, Exercise $exercise){
  		$exercise->update($request->all());
  		return back();
  	}
}
