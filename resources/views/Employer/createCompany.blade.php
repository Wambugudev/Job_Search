@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-default">
        <div class="card-header">Create company</div>
        <div class="card-body">
            <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
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
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tagline">Tagline</label>
                    <input type="text" name="tagline" id="tagline" class="form-control">
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
                    <input type="text" name="ceo" id="ceo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <div class="card-header">Work Experince</div>


                <div class="form-group">
                    <label for="website">Website address</label>
                    <input type="text" name="website" id="website" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="employess">Employees</label>
                    <input type="text" name="employees" id="employees" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>


                <div class="card-header">Social Media</div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" id="twitter" class="form-control">
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control">
                </div>

                <div class="card-header">About Company</div>

                <div class="form-group">

                    <label for="about">About Company</label>
                    <textarea name="about" id="about" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class=" form-group">
                    <button type="submit" class="text-justify-center btn  btn-success">Create Company</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
