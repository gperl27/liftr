<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use Auth;

class WorkoutsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function new(){
    	return view('new_workout');
    }

    public function show(Workout $workout){
    	// dd(json_decode($workout->exercises->first()->weight));

    	return view('show', compact('workout'));
    }

    public function create(Request $request){
    	$user = Auth::user();
    	$user->workouts()->create($request->all());
    	$workout = $user->workouts->last();
    	return redirect("/workouts/$workout->id");
    }
}
