@extends('layouts.app')

@section('content')

<h2>{{ $workout->day }}</h2>

<ul>
@foreach($workout->exercises as $exercise)
	<li>
		<h4>{{ $exercise->name }}</h4>
		<span>Sets: {{ $exercise->sets }}</span>
		<span>Reps: {{ $exercise->reps }}</span>
		<span>Weight: {{ $exercise->weight }}</span>
		<a href="/exercise/{{ $exercise->id }}">Edit this exercise</a>


		<form method="POST" action="/exercise/{{ $exercise->id }}/destroy">
		    <input type="hidden" name="_method" value="DELETE" />
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		    <input class='btn btn-danger' type="submit" value="Delete" />
		</form>

	</li>
@endforeach
</ul>
<a class='btn btn-primary' href="/workout/{{ $workout->id }}/exercise/new">Add New Exercise</a>

@stop