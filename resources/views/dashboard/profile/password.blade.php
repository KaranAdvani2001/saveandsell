@extends('dashboard.master')
@section('main_content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Password Update</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('password.update')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Current Password</label>
          <div class="col-sm-10">
            <input type="password" name="current_password" class="form-control" id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('current_password') }}</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('password') }}</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-10">
            <input type="password" name="password_confirmation" class="form-control"  id="inputEmail3" required>
            <span class="text-danger">{{$errors->first('password_confirmation') }}</span>
          </div>
        </div>        
      </div>

      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-info float-right">Update</button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
@endsection