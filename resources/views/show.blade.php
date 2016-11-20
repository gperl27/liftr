@extends('layouts.app')

@section('content')

<div class='container single-workout-div'>
	<a class='btn btn-success workout-back-btn' href="/"><span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span> Back</a>
	<h2 class='inline-header'>{{ $workout->day }}</h2>
	<a class='new-workout-btn btn btn-primary' href="/workout/{{ $workout->id }}/exercise/new">Add New Exercise <span class='glyphicon glyphicon-plus' aria-hidden='true'></span></a>

	<ul class='list-group'>
	@foreach($workout->exercises as $exercise)
		<li class='list-group-item col-md-6 col-md-offset-3'>		
					<h4 class='text-center'>{{ $exercise->name }}</h4>
                    <table class='workout-table table table-condensed'>
                        <tbody>
                            <tr>
                                <th>Sets</th>
                                <td>{{ $exercise->sets }}</td>
                            </tr>
                            <tr>
                                <th>Reps</th>
                                <td>{{ $exercise->reps }}</td>
                            </tr>
                            <tr>
                                <th>Weight (lbs)</th>
                                @foreach( json_decode($exercise->weight) as $weight)
                                    <td>{{ $weight }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class='text-center'>
						<a class='btn btn-warning edit-exercise-btn' href="/exercise/{{ $exercise->id }}">Edit</a>
                    </div>

					<form class='delete-exercise-btn' method="POST" action="/exercise/{{ $exercise->id }}/destroy">
					    <input type="hidden" name="_method" value="DELETE" />
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <input class='btn btn-danger' type="submit" value="X" />
					</form>
		</li>
	@endforeach
	</ul>


</div>
@stop