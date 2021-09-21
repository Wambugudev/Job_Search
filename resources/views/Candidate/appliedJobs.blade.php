@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card card-default">
        <div class="card-header">You have applied for the following jobs</div>
        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>location</th>
                        <th>Status</th>
                    </tr>
                </thead>
                    @foreach ($user->jobs as $job)
                    <tr>
                        <td><img src="storage/{{$job->image}}" alt="" srcset="" style="width: 120px; border-radius: 500%; "></td>
                        <td>{{$job->title}}</td>
                        <td>{{$job->location}}</td>
                        <td> @foreach ($applications as$application)
                            @if ($application->job_id==$job->id AND $application->user_id==$user->id)
                                @if ($application->status=='pending')
                                    <p class="text-danger">{{$application->status}}</p>
                                @elseif($application->status=='accepted')
                                    <p class="text-success">{{$application->status}}</p>
                                @endif
                            @endif
                        @endforeach</td>
                        <td><form action="{{route('Application.destroy',$job->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Application</button>
                        </form></td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
{{-- @foreach ($user->jobs as $user)
    {{$user->title}}
@endforeach --}}
@endsection
