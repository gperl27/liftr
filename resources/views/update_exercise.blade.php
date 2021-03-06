@extends('layouts.app')

@section('content')
<div class='container'>
	<h1>Update Exercise</h1>

	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	
	<form action="/exercise/{{ $exercise->id }}/update" method="post" accept-charset="utf-8">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PATCH" />
		<div class='form-group'>
			<label for="exerciseName">Exercise Name</label>
			<input class='form-control' type="text" name="name" id='exerciseName' placeholder="Enter exercise name" value="{{ $exercise->name }}">
		</div>		
		<div class='form-group'>
			<label for="exerciseSets">Sets</label>
			<input class='form-control' type="number" name="sets" id='exerciseSets' placeholder="Enter amount of sets" value="{{ $exercise->sets }}">
		</div>
		<div class='form-group'>
			<label for="exerciseReps">Reps</label>
			<input class='form-control' type="number" name="reps" id='exerciseReps' placeholder="Enter amount of reps" value="{{ $exercise->reps }}">
		</div>
		<div class='form-group'>
            @foreach( json_decode($exercise->weight) as $weight)
                <label for="exerciseWeight">Weight</label>
				<input class='form-control' type="number" name="weight[]" id='exerciseWeight' placeholder="Enter amount of weight" value="{{ $weight }}">
	        @endforeach
		</div>
		<button type="submit" class="btn btn-success">Save</button>
		<a class='btn btn-warning' href="/workouts/{{ $exercise->workout_id }}">Back</a>
	</form>

</div>

@stop