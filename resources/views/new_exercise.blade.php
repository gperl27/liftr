@extends('layouts.app')

@section('content')
<div class='container'>
	<h1>Add Exercise</h1>
	
	<form action="/workout/{{ $workout_id }}/exercise/create" method="post" accept-charset="utf-8">
		{{ csrf_field() }}
		<div class='form-group'>
			<label for="exerciseName">Exercise Name</label>
			<input class='form-control' type="text" name="name" id='exerciseName' placeholder="Enter exercise name">
		</div>		
		<div class='form-group'>
			<label for="exerciseSets">Sets</label>
			<input class='form-control' type="number" name="sets" id='exerciseSets' placeholder="Enter amount of sets">
		</div>
		<div class='form-group'>
			<label for="exerciseReps">Reps</label>
			<input class='form-control' type="number" name="reps" id='exerciseReps' placeholder="Enter amount of reps">
		</div>
		<div class='form-group'>
			<label for="exerciseWeight">Weight</label>
			<input class='form-control' type="number" name="weight" id='exerciseWeight' placeholder="Enter amount of weight">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>

</div>

@stop