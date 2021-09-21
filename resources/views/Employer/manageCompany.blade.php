@extends('layouts.app')

@section('content')
<?php $i=1 ?>

<div class="container">
    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">Manage Company</div>
                <div class="col-md-2"><a href="{{route('job.create')}}" class="btn btn-success">Create job</a></div>
            </div>
        </div>
    </div>
    <div class="card card-default mt-4">
        <div class="card-header">
            Your jobs.
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Applications</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                        @foreach ($jobs as $job)
                        <tr>
                            <td>{{$i}}</td>
                            <td><img src="storage/{{$job->image}}" alt="" srcset="" style="width: 50px"></td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->location}}</td>
                            <td><a href="{{route('show.application',$job->id)}}">{{$job->users->count()}}</a></td>
                            <td><a href="{{route('job.edit',$job->id)}}" class="btn btn-primary btn-xs">Edit</a></td>
                            <td>
                                <form action="{{route('job.destroy',$job->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
