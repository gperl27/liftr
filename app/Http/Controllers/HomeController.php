<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $workouts = $user->workouts;
        $mondayWorkout = $workouts->where('day' , 'Monday')->first();
        $mondayExercises = $mondayWorkout->exercises;
        return view('home', compact('mondayExercises'));
    }
}
