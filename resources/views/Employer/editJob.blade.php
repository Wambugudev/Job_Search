@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card card-default">
        <div class="card-header">Edit your Job</div>
        <div class="card-body">
            <form action="{{route('job.update',$job->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- Error Message --}}
                @if ($errors->any())
                <ul class="list-group ">
                    @foreach ($errors->all() as $error)
                        <li class=" text-danger list-group-item">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" name="title" id="title" value="{{$job->title}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="type">Job Type</label>
                <select name="type" class="form-control" id="type">
                    <option value="fulltime">Full Time</option>
                    <option value="parttime">Part Time</option>
                    <option value="freelancer">Freelancer</option>
                    <option value="internship">Internship</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="3" rows="5" class="form-control">{{$job->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" value="{{$job->location}}" class="form-control">
            </div>
            <div>
                <img src="storage/{{$job->image}}" alt="" srcset="" style="width: 280px">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="requirements">Requirements</label>
                <textarea name="requirements" id="requirements" cols="10" rows="10" class="form-control">{{$job->requirements}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
