@extends('dashboard.master')
@section('main_content')

<div class="row">
    <div class="col-12">
      {{-- <div class="card card-info"> --}}
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">My user</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 400px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Telephone Number</th>
                <th>Address line1</th>
                <th>Post code</th>
                <th>City,Country</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @if(isset($users[0]))
                @foreach ($users as $user )                    
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{$user->image}}" alt="" width="30" height="30"></td>
                    <td>{{$user->first_name .' '.$user->last_name}}</td>
                    <td>{{$user->telephone_number}}</td>
                    <td>{{$user->address_line1}}</td>
                    <td>{{$user->post_code}}</td>
                    <td>{{$user->city.','.$user->country}}</td>
                    <td>{{$user->is_admin ? "Admin" : "General User"}}</td>
                    <td>
                      @if ($user->id != Auth::id())
                        @if($user->is_admin)
                        <a type="button" name="edit" href="{{route('remove.admin', encrypt($user->id))}}" class="edit btn btn-warning btn-sm">Remove Admin</a>
                        @else 
                        <a type="button" name="edit" href="{{route('make.admin', encrypt($user->id))}}" class="edit btn btn-primary btn-sm">Make Admin</a>
                        @endif
                      @endif
                    </td>
                </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          {!! $users->links() !!}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection