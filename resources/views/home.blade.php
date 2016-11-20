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
<div class='container-fluid'>
    <div class='row'>   
        <div class='col-md-2 col-md-offset-1'>
            <h2 class='inline-header'>Monday</h2>
            @if($mondayWorkout)
                <a class='btn btn-warning home-edit-btn' href="/workouts/{{ $mondayWorkout->id }}"><span class='glyphicon glyphicon-pencil' aria-hidden="true"></span></a>
                <ul class='list-group'>
                @foreach($mondayExercises as $exercise)
                    <li class='list-group-item'>
                        <h4 class='h4-home'>{{ $exercise->name }}</h4>
                        <table class='table table-condensed'>
                            <thead>
                                <tr>
                                    <th>Sets</th>
                                    <th>Reps</th>
                                    <th>Weight (lbs)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $exercise->sets }}</td>
                                    <td>{{ $exercise->reps }}</td>
                                    <td>{{ $exercise->weight }}</td>
                                </tr>
                            </tbody>
                        </table>
                @endforeach
                </ul>
            @else
                <h4 class='h4-home alert alert-info'>No Monday workout found for this week.</h4>
            @endif
        </div>
        <div class='col-md-2'>
            <h2 class='inline-header'>Tuesday</h2>
            @if($tuesdayWorkout)
                <a class='btn btn-warning home-edit-btn' href="/workouts/{{ $tuesdayWorkout->id }}"><span class='glyphicon glyphicon-pencil' aria-hidden="true"></span></a>
                <ul class='list-group'>
                @foreach($tuesdayExercises as $exercise)
                    <li class='list-group-item'>
                        <h4 class='h4-home'>{{ $exercise->name }}</h4>
                        <table class='table table-condensed'>
                            <thead>
                                <tr>
                                    <th>Sets</th>
                                    <th>Reps</th>
                                    <th>Weight (lbs)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $exercise->sets }}</td>
                                    <td>{{ $exercise->reps }}</td>
                                    <td>
                                    @foreach( json_decode($exercise->weight) as $weight)
                                        {{ $weight }},
                                    @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                @endforeach
                </ul>
            @else
                <h4 class='h4-home alert alert-info'>No Tuesday workout found for this week.</h4>
            @endif
        </div>
        <div class='col-md-2'>
            <h2 class='inline-header'>Wednesday</h2>
            @if($wednesdayWorkout)
                <a class='btn btn-warning home-edit-btn' href="/workouts/{{ $wednesdayWorkout->id }}"><span class='glyphicon glyphicon-pencil' aria-hidden="true"></span></a>
                <ul class='list-group'>
                @foreach($wednesdayExercises as $exercise)
                    <li class='list-group-item'>
                        <h4 class='h4-home'>{{ $exercise->name }}</h4>
                        <table class='table table-condensed'>
                            <thead>
                                <tr>
                                    <th>Sets</th>
                                    <th>Reps</th>
                                    <th>Weight (lbs)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $exercise->sets }}</td>
                                    <td>{{ $exercise->reps }}</td>
                                    <td>{{ $exercise->weight }}</td>
                                </tr>
                            </tbody>
                        </table>                    
                    </li>
                @endforeach
                </ul>
            @else
                <h4 class='h4-home alert alert-info'>No Wednesday workout found for this week.</h4>
            @endif
        </div>
        <div class='col-md-2'>
        	<h2 class='inline-header'>Thursday</h2>
            @if($thursdayWorkout)
                <a class='btn btn-warning home-edit-btn' href="/workouts/{{ $thursdayWorkout->id }}"><span class='glyphicon glyphicon-pencil' aria-hidden="true"></span></a>
                <ul class='list-group'>
                @foreach($thursdayExercises as $exercise)
                    <li class='list-group-item'>
                        <h4 class='h4-home'>{{ $exercise->name }}</h4>
                        <table class='table table-condensed'>
                            <thead>
                                <tr>
                                    <th>Sets</th>
                                    <th>Reps</th>
                                    <th>Weight (lbs)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $exercise->sets }}</td>
                                    <td>{{ $exercise->reps }}</td>
                                    <td>{{ $exercise->weight }}</td>
                                </tr>
                            </tbody>
                        </table>                    
                    </li>
                @endforeach
                </ul>
            @else
                <h4 class='h4-home alert alert-info'>No Thursday workout found for this week.</h4>
            @endif
        </div>
        <div class='col-md-2'>
        	<h2 class='inline-header'>Friday</h2>
            @if($fridayWorkout)
                <a class='btn btn-warning home-edit-btn' href="/workouts/{{ $fridayWorkout->id }}"><span class='glyphicon glyphicon-pencil' aria-hidden="true"></span></a>
                <ul class='list-group'>
                @foreach($fridayExercises as $exercise)
                    <li class='list-group-item'>
                        <h4 class='h4-home'>{{ $exercise->name }}</h4>
                        <table class='table table-condensed'>
                            <thead>
                                <tr>
                                    <th>Sets</th>
                                    <th>Reps</th>
                                    <th>Weight (lbs)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $exercise->sets }}</td>
                                    <td>{{ $exercise->reps }}</td>
                                    <td>{{ $exercise->weight }}</td>
                                </tr>
                            </tbody>
                        </table>                    
                    </li>
                @endforeach
                </ul>
            @else
                <h4 class='h4-home alert alert-info'>No Friday workout found for this week.</h4>
            @endif
        </div>
    </div>
</div>
@endsection
