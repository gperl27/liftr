<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon;
use DateTime;

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
    

    public function index($date = null)
    {
        $user = Auth::user();
        $workouts = $user->workouts;
        $currentWeek = $user->currentWeek;

        if($date){        
            switch($date){
                case 'previous':
                    $currentWeek--;
                    $user->update(['currentWeek' => $currentWeek]);
                    break;
                case 'next':
                    $currentWeek++;
                    $user->update(['currentWeek' => $currentWeek]);
                    break;
                case 'current':
                    $currentWeek = date('W');
                    $user->update(['currentWeek' => $currentWeek]);
                    break;
            }
        }

        //Use Currentweek to delegate weeks
        //Refactor this

        $dto = new DateTime();
        $ret['monday'] = $dto->setISODate(date('Y'), $currentWeek)->format('Y-m-d');
        $ret['sunday'] = $dto->modify('+6 days')->format('Y-m-d');        

        $monday = $ret['monday'];
        $sunday = $ret['sunday'];
        $weekof = $monday;
                               
        
        $mondayWorkout = $this->findWorkout('Monday', $monday, $sunday, $workouts);
        $tuesdayWorkout = $this->findWorkout('Tuesday', $monday, $sunday, $workouts);
        $wednesdayWorkout = $this->findWorkout('Wednesday', $monday, $sunday, $workouts);
        $thursdayWorkout = $this->findWorkout('Thursday', $monday, $sunday, $workouts);
        $fridayWorkout = $this->findWorkout('Friday', $monday, $sunday, $workouts);
        // $saturdayWorkout = $this->findWorkout('Saturday', $monday, $sunday, $workouts);
        // $sundayWorkout = $this->findWorkout('Sunday', $monday, $sunday, $workouts);

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
        // if($saturdayWorkout){
        //     $saturdayExercises = $saturdayWorkout->exercises;
        // }        
        // if($sundayWorkout){
        //     $sundayExercises = $sundayWorkout->exercises;
        // }
        // 
        
        //get the exercises of last week and current day for dashboard
        //for comparison week to week
        
        $lastweekDate = date('Y-m-d', strtotime('-1 week'));
        $lastweekWorkout = $workouts->where('week', $lastweekDate)->first()->exercises;

        return view('home', compact('weekof', 'lastweekWorkout',
                                    'mondayExercises', 'mondayWorkout',
                                    'tuesdayExercises', 'tuesdayWorkout',
                                    'wednesdayExercises', 'wednesdayWorkout',
                                    'thursdayExercises', 'thursdayWorkout',
                                    'fridayExercises', 'fridayWorkout'//,
                                    // 'saturdayExercises', 'saturdayWorkout',
                                    // 'sundayExercises', 'sundayWorkout'
                                ));
    }


    private function findWorkout($day, $monday, $sunday, $workouts){
        return $workouts->where('week', '>=', $monday)
                                  ->where('week', '<=', $sunday)
                                  ->where('day' , $day )
                                  ->first();
    }
}
