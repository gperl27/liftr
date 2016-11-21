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

  	public function new($workout_id)
    {
  		// $workout = Workout::find($workout_id);
  		return view('new_exercise', compact('workout_id'));
  	}

  	public function create(Request $request, Workout $workout)
    {
      //strip weight whitespaces, encode it as json string
      $weight = json_encode($request->array);

  		$workout->exercises()->create([
          'name'   => $request->name,
          'sets'   => $request->sets,
          'reps'   => $request->reps,
          'weight' => $weight,
        ]);
  		return redirect("/workouts/$workout->id");
  	}

  	public function destroy(Request $request, Exercise $exercise){
  		$exercise->delete();
  		return back();
  	}

  	public function edit(Exercise $exercise)
    {
  		return view('update_exercise', compact('exercise'));
  	}

  	public function update(Request $request, Exercise $exercise)
    {
      $weight = json_encode($request->array);

      $exercise->update([
          'name'   => $request->name,
          'sets'   => $request->sets,
          'reps'   => $request->reps,
          'weight' => $weight,
        ]);
      $request->session()->flash('status', 'Exercise updated!');
  		return back();
  	}
}
