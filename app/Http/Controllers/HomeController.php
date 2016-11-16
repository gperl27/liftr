<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon;

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
        $monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $sunday = date( 'Y-m-d', strtotime( 'sunday this week' ) );

        $user = Auth::user();
        $workouts = $user->workouts;                        
        
        $mondayWorkout = $this->findWorkout('Monday', $monday, $sunday, $workouts);
        $tuesdayWorkout = $this->findWorkout('Tuesday', $monday, $sunday, $workouts);
        $wednesdayWorkout = $this->findWorkout('Wednesday', $monday, $sunday, $workouts);
        $thursdayWorkout = $this->findWorkout('Thursday', $monday, $sunday, $workouts);
        $fridayWorkout = $this->findWorkout('Friday', $monday, $sunday, $workouts);
        $saturdayWorkout = $this->findWorkout('Saturday', $monday, $sunday, $workouts);
        $sundayWorkout = $this->findWorkout('Sunday', $monday, $sunday, $workouts);

        if($mondayWorkout){
            $mondayExercises = $mondayWorkout->exercises;
        }
        if($tuesdayWorkout){
            $tuesdayExercises = $tuesdayWorkout->exercises;
        }
        if($wednesdayWorkout){
            $wednesdayExercises = $wednesdayWorkout->exercises;
        }
        if($thursdayWorkout){
            $thursdayExercises = $thursdayWorkout->exercises;
        }
        if($fridayWorkout){
            $fridayExercises = $fridayWorkout->exercises;
        }
        if($saturdayWorkout){
            $saturdayExercises = $saturdayWorkout->exercises;
        }        
        if($sundayWorkout){
            $sundayExercises = $sundayWorkout->exercises;
        }


        return view('home', compact('mondayExercises', 'mondayWorkout',
                                    'tuesdayExercises', 'tuesdayWorkout',
                                    'wednesdayExercises', 'wednesdayWorkout',
                                    'thursdayExercises', 'thursdayWorkout',
                                    'fridayExercises', 'fridayWorkout',
                                    'saturdayExercises', 'saturdayWorkout',
                                    'sundayExercises', 'sundayWorkout'
                                ));
    }


    private function findWorkout($day, $monday, $sunday, $workouts){
        return $workouts->where('week', '>=', $monday)
                                  ->where('week', '<=', $sunday)
                                  ->where('day' , $day )
                                  ->first();
    }
}
