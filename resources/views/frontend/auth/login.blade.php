@extends('frontend.master')
@section('main_content')

<section class="h-100" style="background-color: #eee;">
  <form action="{{route('login')}}" method="POST">
    @csrf
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
  
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-black">Login here for sale and trade</h3>
              </div>

              <div class="card mb-4">

                <div class="card-body px-2 py-2 d-flex flex-row">
                  <div class="form-outline flex-fill">
                    <label class="form-label" for="form1">Telephone Number</label>
                    <input type="text" id="form1" name="telephone_number" value="{{old('telephone_number')}}" class="form-control" required/>
                  <span class="text-danger">{{$errors->first('telephone_number')}}</span>
                  </div>
                </div>
                <div class="card-body px-2 py-2 d-flex flex-row">
                <div class="form-outline flex-fill">
                    <label class="form-label" for="form1">Password</label>
                    <input type="password" id="form1" name="password" class="form-control" min="6" required/>
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
                </div>            
          </div>
          
  
          <div class="card">
            <div class="card-body">
              <button type="submit"  class="btn btn-warning btn-block btn">Login</button>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </form>
  </section>
@endsection