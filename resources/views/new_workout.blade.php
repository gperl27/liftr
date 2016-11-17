@extends('layouts.app')

@section('content')
<div class='container'>
	<h1>Add Workout</h1>
	
	<form action="/workouts/create" method="post" accept-charset="utf-8">
		{{ csrf_field() }}
		<div class='form-group'>
			  <label for="chooseDay">What day is this workout? </label>
			  <select name='day' class="form-control" id="chooseDay">
			    <option>Monday</option>
			    <option>Tuesday</option>
			    <option>Wednesday</option>
			    <option>Thursday</option>
			    <option>Friday</option>
{{-- 			    <option>Saturday</option>
			    <option>Sunday</option> --}}
			  </select>
		</div>	

		<div class='form-group'>
			<label>Choose the date so we can keep track of your progress!</label>
			<input type="date" name="week">
		</div>	
		<button type="submit" class="btn btn-primary">Submit</button>
		<a class='btn btn-warning' href="/">Back</a>
	</form>

</div>

@stop