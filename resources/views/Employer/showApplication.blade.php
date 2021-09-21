@extends('layouts.app')

@section('content')
<?php $i=1 ?>

<div class="container">
    <div class="card card-default">
        <div class="card-header">{{$job->title}}</div>
        <div class="card-body">{{$job->description}}</div>
    </div>
    <div class="card card-default mt-3">
        <div class="card-header">Candidates</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Candidate Name</th>
                        <th>Email</th>
                        <th>View Resume</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                    @foreach ($job->users as $user)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{route('app.Resume',$user->id)}}"  class="btn btn-success">View Resume</a></td>
                        <td>
                            @foreach ($applications as$application)
                            @if ($application->job_id==$job->id AND $application->user_id==$user->id)
                                @if ($application->status=='pending')
                                    <p class="text-danger">{{$application->status}}</p>
                                @elseif($application->status=='accepted')
                                    <p class="text-success">{{$application->status}}</p>
                                @endif
                            @endif
                        @endforeach
                        </td>
                        <td><form action="{{route('update.status',['user'=>$user->id,'job'=>$job->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm">Hire</button>
                            </form></td>

                        <td><form action="{{route('delete.application',['user'=>$user->id,'job'=>$job->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Application</button>
                        </form></td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
