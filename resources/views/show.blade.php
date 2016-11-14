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
		<a href="#">Delete</a>
	</li>
@endforeach
</ul>
<a class='btn btn-primary' href="/workout/{{ $workout->id}}/exercise/new">Add New Exercise</a>

@stop