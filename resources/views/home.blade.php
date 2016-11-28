@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class='jumbotron week-status'>
            <a class='btn btn-success' href="/previous"><span class='glyphicon glyphicon-arrow-left'></span> <span class="mobile-hide">Previous<span></a>
            <h1 class="calendar-font">Week of {{ $weekof }}</h1>
            <a class='btn btn-success' href="/next"><span class='glyphicon glyphicon-arrow-right'></span> <span class="mobile-hide">Next</span></a>
        </div>
        <div class='text-center current-week-btn'>
            <a class='btn btn-primary' href='/current'>Current Week</a>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Last Week Today:</h4>
                    @if($lastweekWorkout)
                        @if(count($lastweekExercises) > 0)
                            <ul class="list-inline">
                            @foreach($lastweekExercises as $exercise)
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
                        @endif
                    @else
                        No workout recorded this day last week.
                    @endif
                </div>
            </div>
        </div>
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
                <a class='btn btn-info home-edit-btn' href="/workouts/new"><span class='glyphicon glyphicon-plus'></span></a>
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
                <a class='btn btn-info home-edit-btn' href="/workouts/new"><span class='glyphicon glyphicon-plus'></span></a>
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
                <a class='btn btn-info home-edit-btn' href="/workouts/new"><span class='glyphicon glyphicon-plus'></span></a>
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
                <a class='btn btn-info home-edit-btn' href="/workouts/new"><span class='glyphicon glyphicon-plus'></span></a>
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
                <a class='btn btn-info home-edit-btn' href="/workouts/new"><span class='glyphicon glyphicon-plus'></span></a>
                <h4 class='h4-home alert alert-info'>No Friday workout found for this week.</h4>
            @endif
        </div>
    </div>
</div>
@endsection
