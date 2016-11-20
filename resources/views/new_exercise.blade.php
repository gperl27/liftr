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
			<select type='number' name='sets' class="form-control" id="exerciseSets">
			    <option>1</option>
			    <option>2</option>
			    <option>3</option>
			    <option>4</option>
			    <option>5</option>
			    <option>6</option>
			    <option>7</option>
			    <option>8</option>
			    <option>9</option>
			    <option>10</option>
			 </select>
		</div>
		<div class='form-group'>
			<label for="exerciseReps">Reps</label>
			<input class='form-control' type="number" name="reps" id='exerciseReps' placeholder="Enter amount of reps">
		</div>
		<div id='weights' class='form-group'>
			<label for="exerciseWeight">Weight</label>
			<input class='form-control' type="number" name="array[]" id='exerciseWeight' placeholder="Enter amount of weight">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a class='btn btn-warning' href="/workouts/{{ $workout_id }}">Back</a>
	</form>

</div>

@stop
