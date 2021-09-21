@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card card-default">
        <div class="card-header">Edit Resume</div>
        <div class="card-body">

            <form action="{{route('resume.update',$resume->id)}}" method="post" enctype="multipart/form-data">
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
                    <label for="name">Name</label>
                    <input type="text" id ="name" name="name"  placeholder="Name" value="{{$resume->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="profession">Professional title</label>
                    <input type="text" id ="profession" name="profession" value="{{$resume->profession}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">About Notes</label>
                    <textarea name="about" id="about" cols="30" rows="10" class="form-control">{{$resume->about}}"</textarea>
                </div>

                <div class="form-group">
                    <img src="storage/{{$resume->image}}" style="width: 280px;">
                </div>

                <div class="form-group">
                    <label for="image">Your cover Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group mt-5">
                    <div class="card-header">General Info</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{$resume->email}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phoneNo">Phone number</label>
                            <input type="text" name="phoneNo" id="phoneNo" value="{{$resume->phoneNo}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" name="birthday" id="birthday" value="{{$resume->birthday}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="county">County</label>
                            <select name="county" class="form-control" id="county">
                                <option value="mombasa">Mombasa</option>
                                <option value="nakuru">Nakuru</option>
                                <option value="laikipia">Laikipia</option>
                                <option value="nyeri">Nyeri</option>
                                <option value="nyandarua">Nyandarua</option>
                                <option value="machakos">Machakos</option>
                                <option value="embu">Embu</option>
                                <option value="kituui">Kitui</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-group mt-5">
                        <div class="card-header">Social profiles</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="facebook">Facebook link</label>
                                <input type="text" name="facebook"  value="{{$resume->facebook}}" id="facebook" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter link</label>
                                <input type="text" name="twitter" id="twitter"  value="{{$resume->twitter}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="insta">Instagram link</label>
                                <input type="text" name="insta" id="insta"  value="{{$resume->insta}}" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="form-group mt-5">
                        <div class="card-header"> Resume Content</div>
                        <div class="card-body">
                            <div class="form-group">
                                <textarea name="resumeContent" id="resumeContent" cols="30" rows="10" class="form-control"> "{{$resume->resumeContent}}"</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <div class="card-header">Latest education level</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="school">School</label>
                                <input type="text" id="school" name="school"  value="{{$resume->school}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="qualification">Qualification</label>
                                <input type="text" id="qualification" name="qualification"  value="{{$resume->qualification}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="datefrom">Date from</label>
                                <input type="date" name="dateFromEd" id="dateFromEd"  value="{{$resume->dateFromEd}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="dateToEd">Date to</label>
                                <input type="date" class="form-control"  value="{{$resume->dateToEd}}" name="dateToEd" id="dateToEd">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <div class="card-header">Latest job experince</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="employer">Employer</label>
                                <input type="text" name="employer" id="employer"  value="{{$resume->employer}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" name="position" id="position"  value="{{$resume->position}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="datefromEx">Date from</label>
                                <input type="date" name="from" id="from"  value="{{$resume->from}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="datetoEx">Date to</label>
                                <input type="date" class="form-control" name="to"  value="{{$resume->to}}" id="to">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="card-header">Skills</div>
                        <p class="mt-2">Skill 1</p>
                        <div class="form-group">
                            <input type="text" name="skill1" id="skill1"  value="{{$resume->skill1}}" class="form-control">
                        </div>
                        <p>Skill 2</p>
                        <div class="form-group">
                            <input type="text" name="skill2" id="skill2" value="{{$resume->skill2}}"class="form-control">
                        </div>
                        <p>Skill 3</p>
                        <div class="form-group">
                            <input type="text" name="skill3" id="skill" value="{{$resume->skill3}}" class="form-control">
                        </div>
                    </div>

                    <div class=" form-group">
                        <button type="submit" class="text-justify-center btn  btn-success">Update Details</button>
                    </div>


                </div>
            </form>
        </div>
    </div>

</div>
@endsection
