@extends('layouts.app')

@section('content')
<?php $i=1 ?>
<div class="container">
    <div class="card card-default">
        <div class="card-header">Browse resumes</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Skill 1</th>
                        <th>Skill 2</th>
                        <th>Skill 3</th>
                        <th></th>
                    </tr>
                </thead>
                    @foreach ($resumes as $resume)
                    <tr>
                        <td>{{$i}}</td>
                        <td><img src="storage/{{$resume->image}}" alt="" srcset="" style="width: 120px; border-radius: 500%; "></td>
                        <td>{{$resume->name}}</td>
                        <td>{{$resume->county}}</td>
                        <td>{{$resume->skill1}}</td>
                        <td>{{$resume->skill2}}</td>
                        <td>{{$resume->skill3}}</td>
                        <td><a href="{{route('show.resume',$resume->id)}}" class="btn btn-success">View Resume</a></td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
