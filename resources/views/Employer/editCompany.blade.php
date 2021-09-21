@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-default">
        <div class="card-header">Create company</div>
        <div class="card-body">
            <form action="{{route('company.update',$company->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                    <input type="text" name="name" id="name" value="{{$company->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tagline">Tagline</label>
                    <input type="text" name="tagline" id="tagline" value="{{$company->tagline}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-control" id="category">
                        <option value="software">Software</option>
                        <option value="hardware">Hardware</option>
                        <option value="mechanical">Mechanical</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ceo">Company CEO</label>
                    <input type="text" name="ceo" id="ceo" value="{{$company->ceo}}" class="form-control">
                </div>
                <div class="form-group">
                    <img src="storage/{{$company->image}}" alt="" srcset="" style="width: 280px;">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" value="storage/{{$company->image}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{$company->description}}</textarea>
                </div>

                <div class="card-header">Work Experince</div>


                <div class="form-group">
                    <label for="website">Website address</label>
                    <input type="text" name="website" id="website" value="{{$company->website}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{$company->email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="employess">Employees</label>
                    <input type="text" name="employees" id="employees" value="{{$company->employees}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" id="phone" value="{{$company->phone}}" class="form-control">
                </div>


                <div class="card-header">Social Media</div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" value="{{$company->facebook}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" id="twitter" value="{{$company->twitter}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" id="instagram" value="{{$company->instagram}}" class="form-control">
                </div>

                <div class="card-header">About Company</div>

                <div class="form-group">

                    <label for="about">About Company</label>
                    <textarea name="about" id="about" class="form-control" cols="30" rows="10">{{$company->about}}</textarea>
                </div>

                <div class=" form-group">
                    <button type="submit" class="text-justify-center btn  btn-success">Update Company</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
