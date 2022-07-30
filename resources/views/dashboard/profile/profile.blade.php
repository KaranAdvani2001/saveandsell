@extends('dashboard.master')
@section('main_content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Profile Update</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-10">
            <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}" id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('first_name') }}</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
          <div class="col-sm-10">
            <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('last_name') }}</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Telephone Number</label>
          <div class="col-sm-10">
            <input type="text" name="telephone_number" class="form-control" value="{{$user->telephone_number}}" id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('telephone_number') }}</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Address line1</label>
          <div class="col-sm-10">
            <input type="text" name="address_line1" class="form-control" value="{{$user->address_line1}}" id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('address_line1') }}</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Address line2</label>
          <div class="col-sm-10">
            <input type="text" name="address_line2" class="form-control" value="{{$user->address_line2}}" id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('address_line2') }}</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Post code</label>
          <div class="col-sm-10">
            <input type="text" name="post_code" class="form-control" value="{{$user->post_code}}" id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('post_code') }}</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">City</label>
          <div class="col-sm-10">
            <input type="text" name="city" class="form-control" value="{{$user->city}}" id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('city') }}</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Country</label>
          <div class="col-sm-10">
            <input type="text" name="country" class="form-control" value="{{$user->country}}" id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('country') }}</span>
          </div>
        </div>

        
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Image</label>
          <div class="col-sm-10">
            <input type="file" name="image" class="form-control">
            <span class="text-danger">{{$errors->first('image') }}</span>
          </div>
        </div>
      </div>

      <input type="hidden" name="edit_id" value="{{$user->id}}">
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-info float-right">Update</button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
@endsection