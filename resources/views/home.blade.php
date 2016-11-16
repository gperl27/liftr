@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard (Put previous weeks day/exercises/weights here)</div>
            </div>
        </div>
        <a class='btn btn-info' href="/workouts/new">Add Workout +</a>
    </div>
</div>
<div class='row'>	
    <div class='col-md-2 col-md-offset-1'>
    	<h2>Monday</h2>
    	<a href="/workouts/{{ $mondayWorkout->id }}">Edit</a>
    	<ul>
    	@foreach($mondayExercises as $exercise)
    		<li>
	    		<h4>{{ $exercise->name }}</h4>
	    		<span>Sets: {{ $exercise->sets }}</span>
	    		<span>Reps: {{ $exercise->reps }}</span>
	    		<span>Weight: {{ $exercise->weight }}</span>
    		</li>
    	@endforeach
    	</ul>
    </div>
    <div class='col-md-2'>
    	<h2>Tuesday</h2>
    </div>
    <div class='col-md-2'>
    	<h2>Wednesday</h2>
    </div>
    <div class='col-md-2'>
    	<h2>Thursday</h2>
    </div>
    <div class='col-md-2'>
    	<h2>Friday</h2>
    </div>
</div>
@endsection
