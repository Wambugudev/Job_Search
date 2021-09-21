@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card card-default">
        <div class="card-header">{{$resume->name}}</div>
    </div>
    <div class="card-body">
        <img src="storage/{{$resume->image}}" class="img-responsive">
        <br>
        <div class="card card-default">
            <div class="card-header">Details</div>
            <div class="card-body">
               <b class="mt-3" >Profession:</b> {{$resume->profession}}
               <p></p>
               <b class="mt-3">About:</b> {{$resume->about}}
               <p></p>
               <b>Email:</b> {{$resume->email}}
                <p></p>
                <b>Phone number:</b> {{$resume->phoneNo}}
            </div>
        </div>

    </div>
</div>
<br>

<a href="{{route('browse.resume')}}">Back</a>

<a href="{{route('browse.resume')}}" class=" float-right btn btn-success">Hire</a>

@endsection
