@extends('layouts.app')

@section('content')
<?php $i=1 ?>
<div class="container">
    <div class="card card-default">
        <div class="card-header">Browse jobs</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>location</th>
                        <th></th>
                    </tr>
                </thead>

                    @foreach ($jobs as $job)
                    <tr>
                        <td>{{$i}}</td>
                        <td><img src="storage/{{$job->image}}" alt="" srcset="" style="width: 120px; border-radius: 500%; "></td>
                        <td>{{$job->title}}</td>
                        <td>{{$job->location}}</td>
                        <td><a href="{{route('show.job',$job->id)}}" class="btn btn-success">View Job</a></td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
