@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card card-default">
        <div class="card-header">{{$job->title}}</div>
    </div>
    <div class="card-body">
        <img src="storage/{{$job->image}}" class="img-responsive">
        <br>
        <div class="card card-default">
            <div class="card-header">Details</div>
            <div class="card-body">
                <b>Job Type:</b> {{$job->type}}
                <p></p>
                <b>Job Description:</b> {{$job->description}}
                <p></p>
                <b>Job location:</b> {{$job->location}}
                <p></p>
                <b>Job requirements:</b> {{$job->requirements}}
            </div>
        </div>
        <br>


    </div>
</div>
<br>

<a href="{{route('browse.jobs')}}">Back</a>


<a href="{{route('create.application',$job->id)}}" class=" float-right btn btn-success">Apply</a>

@endsection
