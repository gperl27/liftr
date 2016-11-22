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
  		return view('new_exercise', compact('workout_id'));
  	}

  	public function create(Request $request, Workout $workout)
    {
      $this->validate($request, ['name' => 'required|string', 'sets' => 'required|numeric',
                                 'reps' => 'required|numeric', 'weight.*' => 'required' ]);

      //strip weight whitespaces, encode it as json string
      $weight = json_encode($request->weight);

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
      $this->validate($request, ['name' => 'required|string', 'sets' => 'required|numeric',
                                 'reps' => 'required|numeric', 'weight.*' => 'required' ]);
      
      $weight = json_encode($request->weight);

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
