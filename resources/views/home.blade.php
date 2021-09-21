@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @if(auth()->user()->isCandidate())
        {{-- Hii ni ya dcandidate pekee --}}
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">Candidate links</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group"><a href="{{route('home')}}">Home</a></li>
                        <li class="list-group"><a href="{{route('resume.create')}}">Create resume</a></li>
                        <li class="list-group"><a href="{{route('browse.jobs')}}">Browse jobs</a></li>
                        <li class="list-group"><a href="{{route('applied.jobs')}}">View applied jobs</a></li>
                        <li class="list-group"></li>
                    </ul>
                </div>
            </div>
        </div>

        @elseif(auth()->user()->isEmployer())
        {{-- Hii ni ya Employer pekee --}}
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">Employer links</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group"><a href="{{route('home')}}">Home</a></li>
                        <li class="list-group"><a href="{{route('company.create')}}">Create company</a></li>
                        <li class="list-group"><a href="{{route('job.create')}}">Create job</a></li>
                        <li class="list-group"><a href="{{route('manage.company')}}">Manage company</a></li>
                        <li class="list-group"><a href="{{route('browse.resume')}}">Browse resume</a></li>
                        <li class="list-group"><a href="">Manage resume</a></li>
                        <li class="list-group"><a href="">Manage employee</a></li>
                        <li class="list-group"></li>
                    </ul>
                </div>
            </div>
        </div>

        @elseif(auth()->user()->isAdmin())
        {{-- Hii ni ya Employer pekee --}}
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">Admin links</div>

            </div>
        </div>
        @endif


        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
