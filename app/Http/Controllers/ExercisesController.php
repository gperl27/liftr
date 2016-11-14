<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use App\Exercise;

class ExercisesController extends Controller
{
  	public function new($workout_id){
  		// $workout = Workout::find($workout_id);
  		return view('new_exercise', compact('workout_id'));
  	}

  	public function create(Request $request, $workout_id){
  		$workout = Workout::find($workout_id);
  		$workout->exercises()->create($request->all());
  		return redirect("/workouts/$workout_id");
  	}

  	public function destroy(Request $request, Exercise $exercise){
  		$exercise->delete();
  		return back();
  	}
}
