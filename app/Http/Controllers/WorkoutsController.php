<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;

class WorkoutsController extends Controller
{
    public function show(Workout $workout){
    	return view('show', compact('workout'));
    }
}
